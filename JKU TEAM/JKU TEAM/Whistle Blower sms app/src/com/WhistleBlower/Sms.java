package com.WhistleBlower;

import org.aiti.sms.*;
/**
 *
 * @author Dan
 */
public class Sms
{

  /** set to true if you want debugging information */
	public static final boolean debug = true;

	/**
	 * 
	 * The entry point for our SMS application.  You should register your inbound
	 * handler, set the proxy (if necessary) and set the comm port of the modem.
	 * The service will then start, waiting for incoming messages.
	 *
	 * @param args Args passed from the command line
	 */
public static void main(String args[]) {

		AITISMSServer app = new AITISMSServer();
		try {
			//Set your processor to create a new object of your handler
			SMSHandlerThread.setAITIInboundMessageNotification(new Main());
			//set modem port and speed for the gsm modem
			app.setComPort((short)17,115200);

			//wait for incoming messages
			app.doIt();
		} catch (Exception e) {
			e.printStackTrace();
		}
	}

	/**
	 * A helpful printing method to use instead of System.out.println().
	 * Use Main.debug to toggle printing the the screen.
	 *
	 * @param s The object to print
	 */
	public static final void debugPrintln(Object s) {
		if (debug)
                    System.out.println(s);
	}

}