# Files on the Yothalot cluster

Every node in the Yothalot cluster needs access (and therefore has to be 
mounted) to the GlusterFS file system. This is the only requirement: a Yothalot 
node has to be mounted to the GlusterFS file system, but it is not necessary 
that the node also shares disk space.

This might be confusing. Let's clarify this with the following example: imagine
that in your environment you have 10 servers that all have a lot of free disk 
space. These 10 servers can be grouped together in a GlusterFS cluster to 
bundle their free disk space into one big distributed file system. Besides
these 10 storage servers however, you also have 20 servers that do not have 
disk space to share, but that do have to write log files. You can mount 
these 20 servers to the GlusterFS file system too, so that all of your 30
servers have access to the GlusterFS system: 10 of them are actually sharing
disk space, while the other 20 do not share disk space, but have access via
a network mount.


## The GlusterFS cluster and the Yothalot cluster

Let's continue with the above example. Your GlusterFS cluster is made up of 
10 servers. This GlusterFS cluster is accessible from all of your 30 servers,
because they are all mounted to it. All of them can therefore read and write
files on it, and because of this, you can also use each one of them in the 
Yothalot cluster. When map/reduce tasks are being distributed over the servers, 
the servers that have direct access to the files (the 10 storage servers) will 
of course receive more jobs than the other nodes (because they have the files 
stored locally, making it more efficient to run the jobs on these servers), but 
if all these nodes are busy, tasks will start to be assigned to the other nodes 
as well.

The directory that you use for the mount point is irrelevant. You can mount
the GlusterFS via "/mnt", "/home/user/glusterfs", "/media/glusterfs" or any
other mount point. It is even permitted to use different mount points on 
different servers. The Yothalot framework internally always uses relative 
pathnames (relative to the mount point) and each node can reconstructs these
relative paths into full pathname based on the mount point used on that node.


## The Path class

If you want to turn a relative path to a GlusterFS file or directory into
an absolute path, or the other way around, you can use the Yothalot\Path class
for that:

````php
<?php
// prevent exceptions
try
{
    // create a path object
    $path = new Yothalot\Path("relative/path/to/glusterfs/file");
    
    // output the relative pathname (relative to the glusterfs mountpoint)
    echo("relative: ".$path->relative()."\n");
    
    // output the absolute pathname (this path is only useful on the current 
    // server, because the same file might have a different absolute pathname 
    // on other servers if the GlusterFS is mounted on a different directory)
    echo("absolute: ".$path->absolute()."\n");
}
catch (Exception $exception)
{
    // the pathname was invalid (this means that the path can not be on the
    // gluster, this happens if you specify a pathname like "../../../etc/passwd")
    // the Path class does _not_ check if a file exists, it is permitted to
    // create Path objects for files or dirs that do not (yet) exist
    trigger_error($exception->getMessage());
}
?>
````

The other way around works too: if you have an absolute pathname and you want
to turn that into a relative path (for example because you want to start a
mapreduce task for that file, but you want to distribute the relative path as
the absolute path is only local to the current machine), you can use the
Yothalot\Path class too:

````php
<?php
// prevent exceptions
try
{
    // create a path object
    $path = new Yothalot\Path("/absolute/path/to/glusterfs/file");
    
    // output the relative pathname (relative to the glusterfs mountpoint)
    echo("relative: ".$path->relative()."\n");
    
    // output the absolute pathname (this path is only useful on the current 
    // server, because the same file might have a different absolute pathname 
    // on other servers if the GlusterFS is mounted on a different directory)
    echo("absolute: ".$path->absolute()."\n");
}
catch (Exception $exception)
{
    // the pathname was invalid (happens if you specify an absolute path to
    // a directory that is not at all a GlusterFS mount point)
    trigger_error($exception->getMessage());
}
?>
````
