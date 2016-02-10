/*
  Author: Jeremy Roy

  This program plays the Kirby Dreamland song in a loop to a piezo speaker connected 
  to pin 2 of an Arduino micro-controller.  It's a great way of impressing friends.

  WARNING: 
	After running this program, the Kirby Dreamland theme song will be stuck
	in your head for approximately 1.352 weeks.  Users beware.
*/

const float C0 = 16.35;
const float CS0 = 17.32;
const float D0 = 18.35;
const float DS0 = 19.45;
const float E0 = 20.6;
const float F0 = 21.83;
const float FS0 = 23.12;
const float G0 = 24.5;
const float GS0 = 25.96;
const float An0 = 27.5;
const float Bf0 = 29.14;
const float B_0 = 30.87;
const float C1 = 32.7;
const float CS1 = 34.65;
const float D1 = 36.71;
const float DS1 = 38.89;
const float E1 = 41.2;
const float F1 = 43.65;
const float FS1 = 46.25;
const float G1 = 49;
const float GS1 = 51.91;
const float An1 = 55;
const float Bf1 = 58.27;
const float B_1 = 61.74;
const float C2 = 65.41;
const float CS2 = 69.3;
const float D2 = 73.42;
const float DS2 = 77.78;
const float E2 = 82.41;
const float F2 = 87.31;
const float FS2 = 92.5;
const float G2 = 98;
const float GS2 = 103.83;
const float An2 = 110;
const float Bf2 = 116.54;
const float B2 = 123.47;
const float C3 = 130.81;
const float CS3 = 138.59;
const float D3 = 146.83;
const float DS3 = 155.56;
const float E3 = 164.81;
const float F3 = 174.61;
const float FS3 = 185;
const float G3 = 196;
const float GS3 = 207.65;
const float An3 = 220;
const float Bf3 = 233.08;
const float B3 = 246.94;
const float C4 = 261.63;
const float CS4 = 277.18;
const float D4 = 293.66;
const float DS4 = 311.13;
const float E4 = 329.63;
const float F4 = 349.23;
const float FS4 = 369.99;
const float G4 = 392;
const float GS4 = 415.3;
const float An4 = 440;
const float Bf4 = 466.16;
const float B4 = 493.88;
const float C5 = 523.25;
const float CS5 = 554.37;
const float D5 = 587.33;
const float DS5 = 622.25;
const float E5 = 659.25;
const float F5 = 698.46;
const float FS5 = 739.99;
const float G5 = 783.99;
const float GS5 = 830.61;
const float An5 = 880;
const float Bf5 = 932.33;
const float B5 = 987.77;
const float C6 = 1046.5;
const float CS6 = 1108.73;
const float D6 = 1174.66;
const float DS6 = 1244.51;
const float E6 = 1318.51;
const float F6 = 1396.91;
const float FS6 = 1479.98;
const float G6 = 1567.98;
const float GS6 = 1661.22;
const float An6 = 1760;
const float Bf6 = 1864.66;
const float B6 = 1975.53;
const float C7 = 2093;
const float CS7 = 2217.46;
const float D7 = 2349.32;
const float DS7 = 2489.02;
const float E7 = 2637.02;
const float F7 = 2793.83;
const float FS7 = 2959.96;
const float G7 = 3135.96;
const float GS7 = 3322.44;
const float An7 = 3520;
const float Bf7 = 3729.31;
const float B7 = 3951.07;
const float C8 = 4186.01;
const float CS8 = 4434.92;
const float D8 = 4698.63;
const float DS8 = 4978.03;
const float E8 = 5274.04;
const float F8 = 5587.65;
const float FS8 = 5919.91;
const float G8 = 6271.93;
const float GS8 = 6644.88;
const float An8 = 7040;
const float Bf8 = 7458.62;
const float B8 = 7902.13;

const int q = 500;
const int h = q/2;
const int e = q/4;
const int d = q*2;
const int hole = q*4;

int count = 0;

int intro[] =     {0, CS5, FS5, GS5,  An5, CS5, FS5, GS5,  An5};
int introDual[] = {0, CS6, FS6, GS6,  An6, CS6, FS6, GS6,  An6};
int timeIntro[] = {e,   e,   e,   e,  h+e,   e,   e,   e,  h+e};

int intro2[] =     {0, B4, E5, FS5,  GS5, B4, E5, FS5,  GS5, 0, FS5, GS5, FS5,  F5};
int introDual2[] = {0, B5, E6, FS6,  GS6, B5, E6, FS6,  GS6, 0, FS6, GS6, FS6,  F6};
int timeIntro2[] = {e,  e,  e,   e,  h+e,  e,  e,   e,  h+e, e,   e,   e,   e, q+d};


//declare pin
int speaker = 2;
int speaker2 = 11;

void setup(){
  pinMode(speaker, OUTPUT);
  Serial.begin(9600);
}

void loop(){
  /*play(intro, timeIntro, 9);
  play(intro, timeIntro, 9);
  play(intro2, timeIntro2, 14);
  playDual(intro, timeIntro, introDual, 9);
  playDual(intro, timeIntro, introDual, 9);
  playDual(intro2, timeIntro2, introDual2, 9);*/
  //tone(2, C5, 500);
  tone(11, E5, 500);
  //delay(500);
  //noTone(2);
  //noTone(11);
  while(1);
}

void play(int notes[], int time[], int length){
    for (count = 0; count < length; count++){
    if (notes[count] == 0){
      noTone(speaker);
      delay(time[count]);
    }
    else{
      tone(speaker, notes[count]);
      delay(time[count]);
    }
    noTone(speaker);
    delay(30);
  }
}

void playDual(int notes[], int time[], int notesDual[], int length){
    for (count = 0; count < length; count++){
    if (notes[count] == 0){
      noTone(speaker);
      noTone(speaker2);
      delay(time[count]);
    }
    else{
      tone(speaker, notes[count]);
      tone(speaker2, notesDual[count]);
      delay(time[count]);
    }
    noTone(speaker);
    delay(30);
  }
}
