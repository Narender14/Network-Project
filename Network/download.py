#!/usr/bin/python
from urllib2 import urlopen
import sys
url = sys.argv[1]     # URL passed in Welcome.php
save = sys.argv[2]    # Save As in Welcome.php
print url
doc = urlopen(url)
html=doc.read( )
print "accessed"
print "why"
#f=open("http://localhost/Network/storage/nirvana2.html","w")
f = open("/var/www/Network/"+save+"","w")

f.write(html)
f.close()

