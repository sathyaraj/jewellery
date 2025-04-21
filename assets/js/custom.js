$(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
				 
				  //date function
			 
			  var date = new Date();
    var currDate = date.getDate();
    var hours = date.getHours();
    var dayName = getDayName(date.getDay());
    var minutes = date.getMinutes();
    var monthName = getMonthName(date.getMonth());
    var year = date.getFullYear();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime =  monthName + ' ' + currDate + ' ' + year + ' ' + dayName + ' ' + hours + ':' + minutes + ' ' + ampm;
   // alert(strTime);
 //  document.getElementById("time").innerHTML = '<span style="font-size:14px;">' + strTime + '</span>';


function getMonthName(month) {
    var ar = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
    return ar[month];
}

function getDayName(day) {
    var ar1 = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
    return ar1[day];
}
			


//own 

var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
	
	//tooltip //<a href="#" data-toggle="tooltip" data-placement="top" title="Hooray!">Hover</a>
	 $('[data-toggle="tooltip"]').tooltip(); 
	
			
             });
             
			 