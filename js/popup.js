var popMargTop = ($('#' + 'overlaybox').height() + 80) / 2;
var popMargLeft = ($('#' +  'overlaybox').width() + 80) / 2;
document.getElementById('overlaybox').css({
           'margin-top' : -popMargTop,
           'margin-left' : -popMargLeft
});
function popup()
    {
        document.getElementById('overlaybox').style.display='block';
        document.getElementById('authentification').style.display='block';
   }
function popunder()
    {
        document.getElementById('overlaybox').style.display='none';
        document.getElementById('authentification').style.display='none';
    }
function popupC()
    {
        document.getElementById('overlayboxC').style.display='block';
        document.getElementById('ContacterNous').style.display='block';
    }
//************************************************
function cal()
    {
        document.getElementById('overlayboxd').style.display='block';
        document.getElementById('date').style.display='block';
    }
function popunderd()
    {
        document.getElementById('overlayboxd').style.display='none';
        document.getElementById('date').style.display='none';
   }
//************************************************
function popunderC()
    {
        document.getElementById('overlayboxC').style.display='none';
        document.getElementById('ContacterNous').style.display='none';
   }
   function popunderI()
    {
        document.getElementById('overlayboxI').style.display='none';
        document.getElementById('insc').style.display='none';
   }
   function popupI()
    {
        document.getElementById('overlayboxI').style.display='block';
        document.getElementById('insc').style.display='block';
   }