function ritmo(hora,min,seg,k) {
 if (seg < 60 & min < 60)  {  
    seg = seg * 1  
    seg = seg + min * 60 + hora * 60 * 60
    ritseg = seg / k / 60
    pacemin = ritseg - ritseg % 1
    paceseg = ritseg % 1 * 0.6 * 100 
    paceseg = paceseg - paceseg % 1
    if (paceseg <10) { 
      paceseg = "0" + paceseg
    }
    if (pacemin <10) { 
      pacemin = "0" + pacemin
    }
    if (pacemin  > 1 ) { 
      document.formUsers.rit.value = pacemin + ":" + paceseg + " min/km" 
    }
    else {
      if ( ritseg > 0) {
        document.formUsers.rit.value = "¿!!!? " 
      }
       else { document.formUsers.rit.value = "Datos?"  
       } 
    }
  }
  else { 
    document.formUsers.rit.value = "Min y seg entre (0-59)"
  } 
}