#include <TimerOne.h>

int speaker1 = 2;
int speaker2 = 3;

int singleToneState = 0;
int myPeriod;
int myDuration;
int count = 0;

void setup(){
  pinMode(speaker1, OUTPUT);
  pinMode(speaker2, OUTPUT);
}

int p = 1000/200;

void loop(){
 
 /*digitalWrite(speaker1, HIGH);
 delay(p);
 digitalWrite(speaker1, LOW);
 delay(p);*/
 //tone(speaker1, 200);
 singleTone(speaker1, 200, 2000);
 delay(10000);
 while(1);
}

void singleTone(int pin, int freq, int duration){
  int period = 1000000 / freq;
  myPeriod = period;
  myDuration = duration;
  Timer1.detachInterrupt();
  Timer1.initialize(myPeriod);
  Timer1.attachInterrupt(playSingleTone);
}

void dualTone(int pin1, int freq1, int pin2, int freq2, int duration){
 int period1 = 1000000 / freq1;
 int period2 = 1000000 / freq2;
 int period = LCM(period1, period2);
 Timer1.detachInterrupt();
 //Timer1.attachInterrupt(ISR, LCM(tone1, tone2));
}

void playSingleTone(){
  singleToneState = !singleToneState;
  //count ++;
  if (singleToneState)
    digitalWrite(speaker1, HIGH);
  else
    digitalWrite(speaker1, LOW);
  /*if ((count * myPeriod) > (myDuration * 1000)){
    digitalWrite(speaker1, LOW);
    Timer1.detachInterrupt();
    count = 0;
  }*/
}

int LCM(int num1, int num2){
  int max;
  max = (num1<num2) ? num1 : num2;
  while(1){
    if ((max % num1 == 0) && (max % num2 == 0))
       return max;
    ++max;
  }
}
