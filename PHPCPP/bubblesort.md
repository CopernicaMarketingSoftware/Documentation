# How fast is a C++ extension?

Native extensions are fast. But how fast are they? We can demonstrate this with a very simple extension: bubblesort.

Bubblesort is an extremely inefficient sorting algorithm that is never used in real world software - but that is often used in universities to demonstrate algorithms. We will show you an implementation of this algorithm in PHP and in C++ - and see how much faster the C++ code is.

```php
    <?php
        /**
         *  Bubblesort function in PHP
         *
         *  This function takes an unsorted array as input, sorts it, and returns
         *  the output. It only uses normal PHP operations, and does not rely on
         *  any built-in PHP functions or on functions from extensions
         *
         *  @param  array       An unsorted array of integers
         *  @return array       A sorted array
         */
        function scripted_bubblesort(array $input)
        {
            // number of elements in the array
            $count = count($input);

            // loop through the array
            for ($i = 0; $i < $count; $i++)
            {
                // loop through the elements that were already processed
                for ($j = 1; $j < $count - $i; $j++)
                {
                    // move on if smaller
                    if ($input[$j-1] <= $input[$j]) continue;

                    // swap elements
                    $temp = $input[$j];
                    $input[$j] = $input[$j-1];
                    $input[$j-1] = $temp;
                }
            }

            // done
            return $input;
        }
    ?>
```
And exactly the same algorithm in C++:

```cpp
    #include <phpcpp.h>

    /**
     *  Bubblesort function in C++
     *
     *  This function takes an unsorted array as input, sorts it, and returns
     *  the output. Notice that we have not really done our best to make the
     *  implementation of this function as efficient as possible - we use stl
     *  containers for example - it is simple looking plain C++ function with
     *  a lot of room for improvements.
     *
     *  @param  array       An unsorted array of integers
     *  @return array       A sorted array
     */
    Php::Value native_bubblesort(Php::Parameters &params)
    {
        // there is one input array, cast the PHP variable to a vector of ints
        std::vector<int> input = params[0];

        // loop through the array
        for (size_t i = 0; i < input.size(); i++)
        {
            // loop through the elements that were already processed
            for (size_t j = 1; j < input.size() - i; j++)
            {
                // move on if smaller
                if (input[j-1] <= input[j]) continue;

                // swap elements
                int temp = input[j];
                input[j] = input[j-1];
                input[j-1] = temp;
            }
        }

        // done
        return input;
    }

    /**
     *  Switch to C context, because the Zend-engine calls the get_module() method
     *  in C context, and not in C++ context
     */
    extern "C" {

        /**
         *  When a PHP extension starts up, the Zend engine calls the get_module()
         *  function to find out which functions and classes are offered by the 
         *  extension
         *
         *  @return void*   pointer to memory address holding the extension information
         */
        PHPCPP_EXPORT void *get_module() 
        {
            // create an instance of the Php::Extension class
            static Php::Extension extension("bubblesort", "1.0");

            // add the bubblesort function to the extension, we also tell the 
            // extension that the function receives one parameter by value, and
            // that that parameter must be an array
            extension.add("native_bubblesort", native_bubblesort, { 
                Php::ByVal("input", Php::Type::Array)
            });

            // return the extension
            return extension;
        }
    }
```

You may be surprised how simple the C++ function looks. It is almost identical to the PHP code. That's true indeed, writing native extensions with PHP-CPP is simple, and you can easily port your PHP functions to C++.

You also see an additional get_module() function in the source code. This is the [startup function](PHPCPP/loading-extensions) that is called by the Zend engine when PHP starts up. It is supposed to return information to the Zend engine about the extension, so that the `"native_bubblesort"` function is accessible for PHP scripts.

## We start with a silly question

How would the native bubblesort function compare to the built-in sort() function of PHP? This is a silly question. Bubblesort is an extremely inefficient algorithm, which should never be user for real sorting. We have only used it here to demonstrate the performance difference between PHP and C++, when you implement _exactly the same_ algorithm in the two languages.

The built-in sort() function of PHP is much faster than bubblesort. It is based on quicksort, one of the best and most famous sorting algorithms there is. And on top of that: the built-in sort() function is implemented in C! Thus, when you compare the example C++ bubblesort function with the built-in PHP sort() function, you are comparing two _different_ algorithms, and _both_ have a _native implementation_. And we want to do exactly the opposite: we want to compare two _identical_ algorithms, one of which is written in PHP, and the other one completely in C++.

Ok. It's time for the results. Let's run the two functions with an array filled with random numbers.

```php
    <?php

        // fill an array with random numbers
        $count = 10000;
        $x = array();
        for ($i=0; $i<$count; $i++) $x[] = rand(0, 1000000);

        // run the native and scripted bubblesort functions
        $start = microtime(true);
        $y = native_bubblesort($x);
        $native = microtime(true);
        $x = scripted_bubblesort($x);
        $scripted = microtime(true);

        // show the results
        echo("Native:   ".($native - $start)." seconds\n");
        echo("Scripted: ".($scripted - $native)." seconds\n");

    ?>
```
This is the output on a regular laptop. You can see that the native C++ implementation is more than ten times faster than the PHP implementation.

```
Native:   0.79793095588684 seconds
Scripted: 8.9202060699463 seconds
```
## Summary

C++ is faster - much faster - than code in PHP, even for very simple scripts. The source code for an extension written in C++ is almost identical to the source of the same algorithm in PHP. This means that every programmer that is capable of writing a PHP script, could just as well write it in C++ and get a ten times better performance.
