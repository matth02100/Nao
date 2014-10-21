# -*- encoding: UTF-8 -*-

import sys
import time

import motion
from naoqi import ALProxy


def GetVolume(audioProxy):
    print audioProxy.getOutputVolume()
    
def SetVolume(audioProxy,nb):
    audioProxy.setOutputVolume(int(nb))


def main(robotIP, cmd, arg1):
    # Init proxies.
    try:
        audioProxy = ALProxy("ALAudioDevice", robotIP, 9559)
    except Exception, e:
        print "Could not create proxy to ALAudioDevice"
        print "Error was: ", e


    if cmd == "set":
        SetVolume(audioProxy,arg1)
    elif cmd == "get":
        GetVolume(audioProxy)	
        
if __name__ == "__main__":
    robotIp = "nao.local"

    if len(sys.argv) <= 1:
        print "Usage python volume.py robotIP (optional default: 127.0.0.1 or nao.local)"
    else:
        robotIp = sys.argv[1]
        arg1 = "null"
        arg2 = "null"
        arg3 = "null"
        cmd = "null"
        
        if len(sys.argv) >= 3:
            cmd = sys.argv[2]
            
        if len(sys.argv) >= 4:
            arg1 = sys.argv[3]
            
        main(robotIp, cmd, arg1)
