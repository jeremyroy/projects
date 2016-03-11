#define BASERED 2500
#define BASEGREEN 2400
#define BASEBLUE 2600

int S0 = 12;
int S1 = 13;
int S2 = 11;
int S3 = 10;
int button = 3;
int colorOut = 5;
int colorOn = 2;

void setup() {
  pinMode(S0, OUTPUT);
  pinMode(S1, OUTPUT);
  pinMode(S2, OUTPUT);
  pinMode(S3, OUTPUT);
  pinMode(colorOut, INPUT);
  pinMode(button, INPUT);
  Serial.begin(9600);
}

void loop(){
  int red, green, blue;
  if (digitalRead(button) == 1){
    readColor(red, green, blue, 100);
    Serial.print("Red:\t");
    Serial.print(red);
    Serial.print("\tGreen:\t");
    Serial.print(green);
    Serial.print("\tBlue:\t");
    Serial.println(blue);
  }
}

void readColor(int& red, int& green, int& blue, int n){ //n is number of readings
  //Turn on colour sensor Power
  digitalWrite(colorOn, HIGH);
  //set frequency scaling to 2%
  digitalWrite(S0, LOW);
  digitalWrite(S1, HIGH);
  //Read colours
  red = getRFreq(n);
  green = getGFreq(n);
  blue = getBFreq(n);
  //Turn into intensity rating (base 256)
  red = (double(red)/BASERED)*256;
  green = (double(green)/BASEGREEN)*256;
  blue = (double(blue)/BASEBLUE)*256;
  //Turn off all power to colorSensor
  digitalWrite(S0, LOW);
  digitalWrite(S1, LOW);
  digitalWrite(S2, LOW);
  digitalWrite(S3, LOW);
  digitalWrite(colorOn, LOW);
}

int getRFreq(int n){
  int rLength;
  double rFreq = 0;
  digitalWrite(S2, LOW);
  digitalWrite(S3, LOW);
  for (int i = 0; i < n; i++){
    rLength = pulseIn(colorOut, HIGH);
    rFreq += 1.0/rLength;
  }
  rFreq = (rFreq/n)*1000000.0;
  return int(rFreq);
}

int getGFreq(int n){
  int gLength;
  double gFreq;
  digitalWrite(S2, HIGH);
  digitalWrite(S3, HIGH);
  for (int i = 0; i < n; i++){
    gLength = pulseIn(colorOut, HIGH);
    gFreq += 1.0/gLength;
  }
  gFreq = (gFreq/n)*1000000.0;
  return int(gFreq);
}

int getBFreq(int n){
  int bLength;
  double bFreq;
  digitalWrite(S2, LOW);
  digitalWrite(S3, HIGH);  
  for (int i = 0; i < n; i++){
    bLength = pulseIn(colorOut, HIGH);
    bFreq += 1.0/bLength;
  }
  bFreq = (bFreq/n)*1000000.0;
  return int(bFreq);
}
