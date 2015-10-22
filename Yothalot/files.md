# Files on the Yothalot cluster

Every node in the Yothalot cluster needs access (and therefore has to be 
mounted) to the GlusterFS file system. This is a hard requirement: a Yothalot 
node has to be mounted to the GlusterFS file system. However, it is not necessary 
that the node also shares disk space.

This might be confusing. Let's clarify this with the following example: imagine
that in your environment you have 10 servers that all have a lot of disk 
space. These 10 servers can be grouped together in a GlusterFS cluster to 
bundle their disks into one big distributed file system. Besides
these 10 storage servers however, you also have 20 servers that do not have 
disk space to share, but that do have to write log files. You can mount 
these 20 servers to the GlusterFS file system too, so that all of your 30
servers have access to the GlusterFS system: 10 of them are actually sharing
disk space, while the other 20 do not share disk space, but have access via
a network mount.


## The GlusterFS cluster and the Yothalot cluster

Let's continue with the above example: 30 of your servers can read and write
files on GlusterFS, and because of this, you can also use each one of them in the 
Yothalot cluster. When tasks are being distributed over the nodes, the servers 
that have direct access to the files (the 10 storage servers) are more likely
to receive jobs than the other nodes (because they have local access to the files, 
making it more efficient to run the jobs on these servers), but if all these 
storage nodes are busy running tasks, tasks will start to be assigned to the 
other nodes as well.

The directory that you use for the mount point is irrelevant. You can mount
GlusterFS on "/mnt", "/home/user/glusterfs", "/media/glusterfs" or any
other mount point. It is even permitted to use different mount points on 
different servers. The Yothalot framework internally always uses relative 
pathnames (relative to the mount point) when tasks are assigned, and each node 
reconstructs these relative paths into full pathname based on the mount point 
used on that node.

Since Yothalot can deal with the different mounting points, you do not have to 
take care of path resolution. However, it may be that you are generating intermediate
files yourself. In such a case you may want to have full control over path
names and may want to switch between absolute and relative paths.  
To help you in situations like this we have created
[Yothalot\Path](copernica-docs:Yothalot/php-path "Yothalot\Path") for PHP users
and [Yothalot::Path](copernica-docs:Yothalot/cpp-path "Yothalot::Path") for
C++ users. With these helper classes switching between absolute and relative
paths becomes a trivial task.

