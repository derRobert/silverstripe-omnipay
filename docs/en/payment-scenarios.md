# Payment scenarios

Here is how different gateway scenarios can play out:

### On-site 'purchase' gateway:

 * Purchase requested / or request failed
 * Purchase successful / or gateway response failure

### Off-site 'purchase' gateway:

 * Purcahse requested / or request failed
 * Purchase request successful / or gateway responds with failure
 
  ...client now visits external gateway...

 * Complete purchase requested / or request failed (triggered by client return, or by a call from gateway server)
 * Complete purchase successful / or gateway responds with failure

### On-site 'authorize/capture' gateway:
 * Authorization requested / or request failed
 * Authorize successful / or gateway responds with failure

  ...later...

 * Capture requested / or request failed (triggered by system, admin, or user)
 * Capture successful / or gateway responds with failure

### Off-site 'authorize/capture' gateway:

 * Authorization requested / or request failed
 * Authorize successful / or gateway responds with failure

 ...client now visits external gateway...

 * Complete authorize requested / or request failed (triggered by client return, or by a call from gateway server)
 * Complete authorize successful / or gateway responds with failure

 ...later...

 * Capture requested / or request failed (triggered by system, admin, or user)
 * Capture successful / or gateway responds with failure

### 'manual' gateway:

 * Manual payment requested / or request failed

 ... payment is made via bank, cheque, cash etc ...

 * Manual payment completed by admin (or system?) / or fails for some reason?