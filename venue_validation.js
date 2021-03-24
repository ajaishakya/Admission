function validation()
{
    var date=document.getElementById("date").value;
    var stime= document.getElementById("stime").value;
    var etime= document.getElementById("etime").value;
    var eventtype= document.getElementById("eventtype").value;

    //For Time format        
    var timeStart = new Date("01/01/2000 " + stime).getTime();
    var timeEnd = new Date("01/01/2000 " + etime).getTime();
    var timeDiff = timeEnd - timeStart;
    
    //For Date Variable
    var insertedDate = new Date(date).getTime();
    var currentDate = new Date().getTime();

    // Date Validation
    if(date=="")
    {
        alert("Date is empty");
        return false;
    }

    if(insertedDate<currentDate)
    {
        alert("Date is Invalid");
        return false;
    }

    // Start Time Validation
    if(stime=="")
    {
        alert("Start time is empty");
        return false;
    }

    // End Time Validation
    if(etime=="")
    {
        alert("End Time is empty");
        return false;
    }

    // Time Validation
    if(stime>etime || stime==etime)
    {
        alert("Event end time should be greater than start time");
        return false;
    }

    if(timeDiff<3600000)
    {
        alert("The minimun time for an event is 1hr");
        return false;
    }

    if(timeStart<946682100000 || timeEnd>946743300000)
    {
        alert("Venue can be booked from 5am to 10pm");
        return false;
    }

    // Event Type Validation
    if(eventtype=="Events")
    {
        alert("Event Type is empty");
        return false;
    }
}