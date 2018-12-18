/*
* donation-id.js
*/

 // Function to get the details of a donation by donation ID.

 
 $( document ).ready(function() {

//  window.location.search.split('=')[1]


  const Http = new XMLHttpRequest();
  const url='https://link.justgiving.com/v1/charity/donate/charityId/248692?amount=10.00&currency=GBP&reference=website&exitUrl=http%3A%2F%2Fwww.roundaboutdramatherapy.org.uk%3FjgDonationId%3DJUSTGIVING-DONATION-ID&message=Thanks%20for%20your%20donation!';
  Http.open("GET", url);
  Http.send();
  Http.onreadystatechange=(e)=>{
  console.log(Http.responseText)
  }

  }); 