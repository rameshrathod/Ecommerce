function validate()
{
  if(document.getElementById('records_per_page').value==0)
	  {
	  alert("Number of records should not be 0");
	  return false;
	  }
  else
	  {
	  return true;
	  }
}