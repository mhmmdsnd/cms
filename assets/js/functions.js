/* Pasang fungsi ini di file yang membutuhkan place focus <body onLoad='javascript:placeFocus();'> */
function checkFormElementInRange(theForm, theFieldName, min, max)
{
    var theField         = theForm.elements[theFieldName];
    var val              = parseInt(theField.value);

    if (typeof(min) == 'undefined') {
        min = 0;
    }
    if (typeof(max) == 'undefined') {
        //max = Number.MAX_VALUE;
    	max = 1000;
    }

    // It's not a number
    if (isNaN(val)) {
        theField.select();
        theField.value = min;
        alert(errorMsg1);
        theField.focus();
        return false;
    }
    // It's a number but it is not between min and max
    else if (val < min || val > max) {
        theField.select();
        alert(val + errorMsg2);
        theField.focus();
        return false;
    }
    // It's a valid number
    else {
        theField.value = val;
    }
    return true;
} // end of the 'checkFormElementInRange()' function
function placeFocus () {
  if (document.forms.length > 0) {
    var field = document.forms[0];
    for (i = 0; i < field.length; i++) {
      if ((field.elements[i].type == "text") && (field.elements[i].type != "hidden") && (field.elements[i].type != "select-one") || (field.elements[i].type == "textarea")) {
        document.forms[0].elements[i].focus();
        break;
      }
    }
  }
}
function angka(){
//alert(event.keyCode);
	if ((event.keyCode < 45 || event.keyCode > 57) && event.keyCode != 43 && event.keyCode != 8 && event.keyCode != 37 && event.keyCode != 39) event.returnValue = false;
}
function ReplaceDoted(nStr)
{
	rtn = nStr.replace(/\$|\./g,'');
	rtn = rtn.replace(/\$|\,00/g,'');
	
	return rtn; 
}
function formatCurrency(num)
{
	num = num.toString().replace(/\$|\,/g,'');
	num = ReplaceDoted(num);
	if(isNaN(num))
	num = "0";
	sign = (num == (num = Math.abs(num)));
	num = Math.floor(num*100+0.50000000001);
	cents = num%100;
	num = Math.floor(num/100).toString();
	if(cents<10)
	cents = "0" + cents;
	for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
	num = num.substring(0,num.length-(4*i+3))+'.'+
	num.substring(num.length-(4*i+3));
	if (num) return (((sign)?'':'-') + num);
}
function totalOrder(qty,price,disc)
{
	var total;
	price = ReplaceDoted(price.value);
    disc = parseInt(disc.value);
    if (disc > 0)
    {
        total = parseInt(qty.value * price)-(parseInt(qty.value * price * disc)/100);    
    }
    else
    {
        total = parseInt(qty.value) * parseInt(price);
	}
	return formatCurrency(total);
}
function cekqty (qty,stok,chg)
{
	qty = parseFloat(qty.value);
	stok = parseFloat(stok.value);
	var vmax = document.getElementById(chg);
	if(qty > stok) 
	{
		javascript:alert('Quantity Item Out of Order\nOrder Available are '+stok+' piece(s)');
		vmax.value = stok;
	}
}
function disc_amount(qty)
{
	l=12;
    qty = parseFloat(qty.value);
    if(qty>=l)
    {
        rtn = Math.floor((Math.random() * (16-10)) + 10);
    }
    else
    {
        rtn = 0;
    }
    return rtn;
}
function angka()
{
	if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
}
var marked_row = new Array;
function cekPage(form)
{
 	if(parseInt(form.p.value) > parseInt(form.TotalPage.value))
	{
		alert('Halaman '+parseInt(form.p.value)+' tidak tersedia');
		form.p.value = '1';
	}
}
function markAllRows( container_id ) {
    var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            if ( checkbox.disabled == false ) {
                checkbox.checked = true;
                if ( typeof(marked_row[unique_id]) == 'undefined' || !marked_row[unique_id] ) {
                    rows[i].className += ' marked';
                    marked_row[unique_id] = true;
                }
            }
        }
    }

    return true;
}

function unMarkAllRows( container_id ) {
    var rows = document.getElementById(container_id).getElementsByTagName('tr');
    var unique_id;
    var checkbox;

    for ( var i = 0; i < rows.length; i++ ) {

        checkbox = rows[i].getElementsByTagName( 'input' )[0];

        if ( checkbox && checkbox.type == 'checkbox' ) {
            unique_id = checkbox.name + checkbox.value;
            checkbox.checked = false;
            rows[i].className = rows[i].className.replace(' marked', '');
            marked_row[unique_id] = false;
        }
    }

    return true;
}
var arImages=new Array();

function Preload() {
 var temp = Preload.arguments; 
 for(x=0; x < temp.length; x++) {
  arImages[x]=new Image();
  arImages[x].src=Preload.arguments[x];
 }
}