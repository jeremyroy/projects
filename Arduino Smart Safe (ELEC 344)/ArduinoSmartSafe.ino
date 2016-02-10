/*
*	This code describes the functioning of a tamper-proof safe with
*	smart-password unlock.  Tamper-detection is achieved using a
*	photoresistor and a vibration sensor.  The photodetector monitors
*	whether or not the safe has been pried opened and the vibration
*	sensor monitors rapid, unwanted movements.  Smart unlock is achieved
*	using two soft-pot potentiometers.  
*	
*	Currently the user cannot reset the password manually.  This could 
*	be an interesting add-on for future implementations of a smart-safe.
*
*
*	Authors:
*		Jeremy Roy
*		Jeremie Jollivet
*/

#include <Servo.h>
#include "safetyBox.h"

int Soft_pin1 = A1;
int Soft_pin2 = A2;
int Photo_pin = A3;

void setup() {
  // Set up sensors and actuators
  //Sensors
  pinMode(Soft_pin1, INPUT);
  pinMode(Soft_pin2, INPUT);
  pinMode(Photo_pin, INPUT);
  pinMode(Vibration_pin, INPUT);
  
  pinMode(Button_pin, INPUT);
  
  //Actuators
  pinMode(Soft_pin1, INPUT);
  pinMode(Soft_pin2, INPUT);
  pinMode(Photo_pin, INPUT);
  pinMode(Vibration_pin, INPUT);
  
  pinMode(RLED_pin, OUTPUT);
  pinMode(YLED_pin, OUTPUT);
  pinMode(GLED_pin, OUTPUT);
  
  pinMode(Speaker_pin, OUTPUT);
  
  pinMode(Servo_pin, OUTPUT);
  myServo.attach(Servo_pin);
  myServo.write(50);

  //Turn off all LEDs
  digitalWrite(RLED_pin, LOW);
  digitalWrite(YLED_pin, LOW);
  digitalWrite(GLED_pin, LOW);

  Serial.begin(9600);
  
 /* int _count = 140;
  while(1){
  myServo.write(_count);
  delay(75);
  _count --;
  Serial.println(_count);
  if (_count == 0)
    while(1) {}
  }*/
}//end setup


void loop() {
  if (flag == 0) {
    flag = digitalRead(Button_pin);
    delay(50);
}
  if (flag == 1) {
    rightCombo = readCombo();
    if (rightCombo){
      openBox();
    }
  }
  
 tampered = checkTamper();
  if (tampered || failCount == 5)
    breached(); //sound alarm and blink red LED
  
}//end main loop

int checkTamper(){
  //check for vibrations
  vibration_flag = vibration_check();
  //check if safe is opened using photodiode
  light_flag = light_check();
  //if safety sensors are set off, stay in infinite loop
  if ((vibration_flag == 1) || (light_flag == 1))
    return 1;
  return 0;
}//end checkTamper

int vibration_check() {
  //vibration_count is compared to vibration_time to evaluate the signal over a certain time.
  //Serial.println(digitalRead(Vibration_pin));
  vibration_state = digitalRead(Vibration_pin);
  if ((vibration_state != lastVibration_state) && (vibration_flag == 0)){  
    if (vibration_count > 10){ //increase or decrease to simulate the sensor sensitivity.
      Serial.println("Thief!!");
      vibration_flag = 1;
    }
    else{
      vibration_count +=1;
      Serial.println(vibration_count);
    }
    lastVibration_state = vibration_state;
  }
  if (vibration_time > 50){
    vibration_time = 0;
    vibration_count = 0;
  }
  else
    vibration_time += 1;

  return vibration_flag;
}

int light_check() {
  if (analogRead(Photo_pin)>50){
    return 1;
  }
  else
    return 0;
}//end light_check()

void breached(){
    //tone(Speaker_pin, 1046);
    while(1){//blink LED
      digitalWrite(RLED_pin, HIGH);
      delay(500);
      //digitalWrite(RLED_pin, LOW);
      //delay(500);

      play(start, timeStart, 16);
      play(part1, timePart1, 17);
      play(start, timeStart, 16);
      play(part2, timePart2, 14);
      play(below, timeBelow, 16);
      play(higher1, timeHigher1, 21);
      play(below, timeBelow, 16);
      play(higher2, timeHigher2, 19);
  
      noTone(Speaker_pin);
    }
}//end breached()

void openBox(){
  int servo_position = 50;
  while(servo_position < 160){
    servo_position += 2;
    myServo.write(servo_position);
    delay(60);
  }
  delay(1000);
  
  while (digitalRead(Button_pin) == LOW){
    }

  digitalWrite(GLED_pin, LOW);
  
  while(servo_position > 50){
    servo_position -= 2;
    myServo.write(servo_position);
    delay(60);
  }
  
}

//Read the combination of soft pot potentiometer actions - determine if unlocks
int readCombo(){
    for (int i = 0; i < 5; i++){
      tRead1 = analogRead(Soft_pin1);
      tRead2 = analogRead(Soft_pin2);
      digitalWrite(YLED_pin, LOW);
      if (numPassed == 0 && tRead1 < 50){
        numPassed++;        
        //timer = 0;
      }
      else if (numPassed == 1 && tRead2 > 850){
        numPassed++;
        //timer = 0;
      }
      else if (numPassed == 2 && tRead1 > 850){
        numPassed++;
        //timer = 0;
      }
      else if (numPassed == 3 && tRead2 < 50){
        numPassed++;
        //timer = 0;
      }
      timer++;
      
      Serial.print("tRead1: ");
      Serial.print(tRead1);
      Serial.print("\t tRead2: ");
      Serial.print(tRead2);
      Serial.print("\t numPassed: ");
      Serial.print(numPassed);
      Serial.print("\t timer: ");
      Serial.println(timer);
      
      if (numPassed == 4){
        digitalWrite(GLED_pin, HIGH);
        numPassed = 0; //reset password
        timer = 0;
        flag = 0;
        return 1;
      }
      if (timer == 100){//password failed, reset password
        timer = 0;
        numPassed = 0;
        digitalWrite(YLED_pin, HIGH);
        flag = 0;
        failCount ++;
        return 0;
      }
      delay(10);
    }
    return 0;
}

void play(int notes[], int time[], int length){
    for (count = 0; count < length; count++){
    if (notes[count] == 0){
      noTone(Speaker_pin);
      delay(time[count]);
    }
    else{
      tone(Speaker_pin, notes[count]);
      delay(time[count]);
    }
    noTone(Speaker_pin);
    delay(30);
  }
}
