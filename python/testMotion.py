# -*- encoding: UTF-8 -*-

'''Wake up: sets Motor on and, if needed, goes to initial position'''
import time
import sys
import naoqi
from naoqi import *

def main():

	try:
		motionProxy = ALProxy("ALMotion", "nao.local",9559)
	except Exception, e:
		print "Could not create proxy to ALMotion"
		print "Error was: ", e

	motionProxy.wakeUp()
	joints=["RElbowRoll","RElbowYaw","RHand","RShoulderPitch","RShoulderRoll","RWristYaw"]
	angles=[[0.16878],[0.31136],[1],[ -0.9],[ -0.10282],[ 1.82387]]
	times=[[1],[1],[1],[1],[1],[1]]
	motionProxy.angleInterpolation(joints,angles,times,True)
	time.sleep(5)
	motionProxy.rest()


if __name__ == "__main__":
    main()
