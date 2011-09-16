$(document).ready(function(){
  //FIXME more strict selection
  $("tbody:last").find("tr:gt(1)").find("td:eq(4)").each(function(){
    id = $(this).text();
    $(this).wrapInner("<a href='opMemberEditPlugin?member_id="+id + "'></a>");
  });
});
