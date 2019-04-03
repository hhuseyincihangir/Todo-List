/**
 * @author [Hasan Hüseyin CİHANGİR]
 * @email [hhuseyincihangir@gmail.com]
 * @create date 2019-04-03 15:54:58
 * @modify date 2019-04-03 15:54:58
 * @desc [description]
 */


function addTodo(){
  var todo_title = $("input[name='todo_title']").val();
  var startDate = $("input[name='startDate']").val();
  var finishDate = $("input[name='finishDate']").val();

  $.ajax({
    type : "POST",
    url : base_url+"Todo/insert",
    data : {todo_title, startDate, finishDate},
    success : function(result){
      location.reload();
    },
    error: function()
    {
      alert("Unexpected error.");
    }
  });
}
