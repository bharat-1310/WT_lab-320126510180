function calculateTotal() {
    var a=parseFloat(document.getElementById('appetizers').value);
    var aq=document.getElementById('appid').value;
    var at=a*aq;
    var b=parseFloat(document.getElementById('entrees').value);
    var bq=document.getElementById('entid').value;
    var bt=b*bq;
    var c=parseFloat(document.getElementById('drinks').value);
    var cq=document.getElementById('driid').value;
    var ct=c*cq;
    var d=parseFloat(document.getElementById('desserts').value);
    var dq=document.getElementById('desid').value;
    var dt=d*dq;
    const totalPrice =at+bt+ct+dt;
    document.getElementById('total').innerHTML="Total bill: "+totalPrice;
  }
  document.getElementById('order').addEventListener('submit', function(e) {
    e.preventDefault();
    calculateTotal();
  });