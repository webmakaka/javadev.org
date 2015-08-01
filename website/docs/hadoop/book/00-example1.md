---
layout: page
title: Hadoop
permalink: /linux/distributed-systems/hadoop/example-1/
---


    $ cd /tmp

<br/>

    $ git clone https://github.com/tomwhite/hadoop-book/
    $ cd hadoop-book/

<br/>

    $ mvn package -DskipTests
    $ export HADOOP_CLASSPATH=hadoop-examples.jar
    $ hadoop MaxTemperature input/ncdc/sample.txt output

<br/>

    15/08/01 02:50:56 WARN util.NativeCodeLoader: Unable to load native-hadoop library for your platform... using builtin-java classes where applicable
    15/08/01 02:50:57 INFO Configuration.deprecation: session.id is deprecated. Instead, use dfs.metrics.session-id
    15/08/01 02:50:57 INFO jvm.JvmMetrics: Initializing JVM Metrics with processName=JobTracker, sessionId=
    15/08/01 02:50:57 WARN mapreduce.JobResourceUploader: Hadoop command-line option parsing not performed. Implement the Tool interface and execute your application with ToolRunner to remedy this.
    15/08/01 02:50:57 INFO input.FileInputFormat: Total input paths to process : 1
    15/08/01 02:50:57 INFO mapreduce.JobSubmitter: number of splits:1
    15/08/01 02:50:58 INFO mapreduce.JobSubmitter: Submitting tokens for job: job_local1833063127_0001
    15/08/01 02:50:58 INFO mapreduce.Job: The url to track the job: http://localhost:8080/
    15/08/01 02:50:58 INFO mapreduce.Job: Running job: job_local1833063127_0001
    15/08/01 02:50:58 INFO mapred.LocalJobRunner: OutputCommitter set in config null
    15/08/01 02:50:58 INFO output.FileOutputCommitter: File Output Committer Algorithm version is 1
    15/08/01 02:50:58 INFO mapred.LocalJobRunner: OutputCommitter is org.apache.hadoop.mapreduce.lib.output.FileOutputCommitter
    15/08/01 02:50:58 INFO mapred.LocalJobRunner: Waiting for map tasks
    15/08/01 02:50:58 INFO mapred.LocalJobRunner: Starting task: attempt_local1833063127_0001_m_000000_0
    15/08/01 02:50:58 INFO output.FileOutputCommitter: File Output Committer Algorithm version is 1
    15/08/01 02:50:58 INFO mapred.Task:  Using ResourceCalculatorProcessTree : [ ]
    15/08/01 02:50:58 INFO mapred.MapTask: Processing split: file:/tmp/book/hadoop-book/input/ncdc/sample.txt:0+529
    15/08/01 02:50:58 INFO mapred.MapTask: (EQUATOR) 0 kvi 26214396(104857584)
    15/08/01 02:50:58 INFO mapred.MapTask: mapreduce.task.io.sort.mb: 100
    15/08/01 02:50:58 INFO mapred.MapTask: soft limit at 83886080
    15/08/01 02:50:58 INFO mapred.MapTask: bufstart = 0; bufvoid = 104857600
    15/08/01 02:50:58 INFO mapred.MapTask: kvstart = 26214396; length = 6553600
    15/08/01 02:50:58 INFO mapred.MapTask: Map output collector class = org.apache.hadoop.mapred.MapTask$MapOutputBuffer
    15/08/01 02:50:58 INFO mapred.LocalJobRunner:
    15/08/01 02:50:58 INFO mapred.MapTask: Starting flush of map output
    15/08/01 02:50:58 INFO mapred.MapTask: Spilling map output
    15/08/01 02:50:58 INFO mapred.MapTask: bufstart = 0; bufend = 45; bufvoid = 104857600
    15/08/01 02:50:58 INFO mapred.MapTask: kvstart = 26214396(104857584); kvend = 26214380(104857520); length = 17/6553600
    15/08/01 02:50:58 INFO mapred.MapTask: Finished spill 0
    15/08/01 02:50:58 INFO mapred.Task: Task:attempt_local1833063127_0001_m_000000_0 is done. And is in the process of committing
    15/08/01 02:50:58 INFO mapred.LocalJobRunner: map
    15/08/01 02:50:59 INFO mapred.Task: Task 'attempt_local1833063127_0001_m_000000_0' done.
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: Finishing task: attempt_local1833063127_0001_m_000000_0
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: map task executor complete.
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: Waiting for reduce tasks
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: Starting task: attempt_local1833063127_0001_r_000000_0
    15/08/01 02:50:59 INFO output.FileOutputCommitter: File Output Committer Algorithm version is 1
    15/08/01 02:50:59 INFO mapred.Task:  Using ResourceCalculatorProcessTree : [ ]
    15/08/01 02:50:59 INFO mapred.ReduceTask: Using ShuffleConsumerPlugin: org.apache.hadoop.mapreduce.task.reduce.Shuffle@4a79ed12
    15/08/01 02:50:59 INFO reduce.MergeManagerImpl: MergerManager: memoryLimit=363285696, maxSingleShuffleLimit=90821424, mergeThreshold=239768576, ioSortFactor=10, memToMemMergeOutputsThreshold=10
    15/08/01 02:50:59 INFO reduce.EventFetcher: attempt_local1833063127_0001_r_000000_0 Thread started: EventFetcher for fetching Map Completion Events
    15/08/01 02:50:59 INFO reduce.LocalFetcher: localfetcher#1 about to shuffle output of map attempt_local1833063127_0001_m_000000_0 decomp: 57 len: 61 to MEMORY
    15/08/01 02:50:59 INFO reduce.InMemoryMapOutput: Read 57 bytes from map-output for attempt_local1833063127_0001_m_000000_0
    15/08/01 02:50:59 INFO reduce.MergeManagerImpl: closeInMemoryFile -> map-output of size: 57, inMemoryMapOutputs.size() -> 1, commitMemory -> 0, usedMemory ->57
    15/08/01 02:50:59 INFO reduce.EventFetcher: EventFetcher is interrupted.. Returning
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: 1 / 1 copied.
    15/08/01 02:50:59 INFO reduce.MergeManagerImpl: finalMerge called with 1 in-memory map-outputs and 0 on-disk map-outputs
    15/08/01 02:50:59 INFO mapred.Merger: Merging 1 sorted segments
    15/08/01 02:50:59 INFO mapred.Merger: Down to the last merge-pass, with 1 segments left of total size: 50 bytes
    15/08/01 02:50:59 INFO reduce.MergeManagerImpl: Merged 1 segments, 57 bytes to disk to satisfy reduce memory limit
    15/08/01 02:50:59 INFO reduce.MergeManagerImpl: Merging 1 files, 61 bytes from disk
    15/08/01 02:50:59 INFO reduce.MergeManagerImpl: Merging 0 segments, 0 bytes from memory into reduce
    15/08/01 02:50:59 INFO mapred.Merger: Merging 1 sorted segments
    15/08/01 02:50:59 INFO mapred.Merger: Down to the last merge-pass, with 1 segments left of total size: 50 bytes
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: 1 / 1 copied.
    15/08/01 02:50:59 INFO Configuration.deprecation: mapred.skip.on is deprecated. Instead, use mapreduce.job.skiprecords
    15/08/01 02:50:59 INFO mapred.Task: Task:attempt_local1833063127_0001_r_000000_0 is done. And is in the process of committing
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: 1 / 1 copied.
    15/08/01 02:50:59 INFO mapred.Task: Task attempt_local1833063127_0001_r_000000_0 is allowed to commit now
    15/08/01 02:50:59 INFO output.FileOutputCommitter: Saved output of task 'attempt_local1833063127_0001_r_000000_0' to file:/tmp/book/hadoop-book/output/_temporary/0/task_local1833063127_0001_r_000000
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: reduce > reduce
    15/08/01 02:50:59 INFO mapred.Task: Task 'attempt_local1833063127_0001_r_000000_0' done.
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: Finishing task: attempt_local1833063127_0001_r_000000_0
    15/08/01 02:50:59 INFO mapred.LocalJobRunner: reduce task executor complete.
    15/08/01 02:50:59 INFO mapreduce.Job: Job job_local1833063127_0001 running in uber mode : false
    15/08/01 02:50:59 INFO mapreduce.Job:  map 100% reduce 100%
    15/08/01 02:50:59 INFO mapreduce.Job: Job job_local1833063127_0001 completed successfully
    15/08/01 02:50:59 INFO mapreduce.Job: Counters: 30
    	File System Counters
    		FILE: Number of bytes read=374436
    		FILE: Number of bytes written=927096
    		FILE: Number of read operations=0
    		FILE: Number of large read operations=0
    		FILE: Number of write operations=0
    	Map-Reduce Framework
    		Map input records=5
    		Map output records=5
    		Map output bytes=45
    		Map output materialized bytes=61
    		Input split bytes=113
    		Combine input records=0
    		Combine output records=0
    		Reduce input groups=2
    		Reduce shuffle bytes=61
    		Reduce input records=5
    		Reduce output records=2
    		Spilled Records=10
    		Shuffled Maps =1
    		Failed Shuffles=0
    		Merged Map outputs=1
    		GC time elapsed (ms)=29
    		Total committed heap usage (bytes)=331489280
    	Shuffle Errors
    		BAD_ID=0
    		CONNECTION=0
    		IO_ERROR=0
    		WRONG_LENGTH=0
    		WRONG_MAP=0
    		WRONG_REDUCE=0
    	File Input Format Counters
    		Bytes Read=529
    	File Output Format Counters
    		Bytes Written=29


<br/>

    $ cat output/part-r-00000

    1949	111
    1950	22
