If recibo every 2 months
The value is for the month marked and the month before 
Mes=1;
While( Mes<=12){
Hours=;//hours from that month
If() {//no sample at this month exists
  Mes=Mes+1;
  Hours=Hours+ ;// hours of that month
}
Else{
  Hours=Hours+ ;//hours from the month previous
}
EngAvg=the average consumption for each month included
DemandaProm=EngAvg/Hours;
//if there are various years, find the DemandaProm for each year, and then the average of those values.
// save this value for the Mes actual and the Mes anterior in ce_demanadaPromedio 
Mes=Mes+1;
}

//if there is not a full history of recibos, copy the last value and fill in all with the same value.