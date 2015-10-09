---
layout: page
title: TomCat Installation on Windows
permalink: /docs/appserv/tomcat/installation/windows/
---




<img src="http://img.fotografii.org/images/JavaDev/DownloadingSoftware/DownloadingJRE1.png" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/DownloadingSoftware/DownloadingJRE2.png" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/DownloadingSoftware/DownloadingJRE3.png" alt="TomCat Installation on Windows">



<img src="http://img.fotografii.org/images/JavaDev/DownloadingSoftware/DownloadingTomCat1.png" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/DownloadingSoftware/DownloadingTomCat2.png" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat1.PNG" alt="TomCat Installation on Windows">

<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat2.PNG" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat3.PNG" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat4.PNG" alt="TomCat Installation on Windows">

<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat5.PNG" alt="TomCat Installation on Windows">



<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat6.PNG" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat7.PNG" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat8.PNG" alt="TomCat Installation on Windows">

<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat9.PNG" alt="TomCat Installation on Windows">





### Setup port 80 as default


C:\Program Files\apache-tomcat\conf\server.xml

We should change 8080 on 80.


    <Connector port="80" protocol="HTTP/1.1"
    connectionTimeout="20000"
    redirectPort="8443" />


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat10.PNG" alt="TomCat Installation on Windows">




Create file StartApacheTomcat.bat


    cd C:\Program Files\apache-tomcat\bin
    startup 


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat11.PNG" alt="TomCat Installation on Windows">


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat12.PNG" alt="TomCat Installation on Windows">


Check  
Try to connect http://localhost/


<img src="http://img.fotografii.org/images/JavaDev/installingApacheTomcat/installingApacheTomcat13.PNG" alt="TomCat Installation on Windows">


