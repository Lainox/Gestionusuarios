function tp (min, seg, k) {
if (k > 0) { 
 if (min < 60 & seg < 60) {
  if (min > 1) { 
   seg = seg * 1
   seg = seg + min * 60
   seg = seg * k
   seg = seg / 60
   min = min * 1
   min = seg
   seg = min % 1
   min = min - min % 1
   seg = seg * 0.6 * 100
   seg = seg - seg % 1
   hora = min / 60
   hora = hora - hora % 1
   min = min - hora * 60
   if (min < 10) { 
       min = "0" + min
   }
   if (seg < 10) { 
       seg = "0" + seg
   }
   document.formUsers.time.value = hora + "hr" + min + "min" + seg + "seg"
       }
  else {
     document.formUsers.time.value = "¿!!!?"
  }  
          }
  else { 
     document.formUsers.time.value = "Min. y seg. entre (0-59)"
  }
     }
 else { 
     document.formUsers.time.value = "Falta la distancia" 
 }        
}