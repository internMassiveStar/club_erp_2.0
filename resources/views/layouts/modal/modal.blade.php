<div class="modal" tabindex="-1" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
        
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img id="attachment"  style="width: 95%;height:70%;" />
           
          <p id="product-desc">
           

          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
        </div>
      </div>
    </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script>
        $('#myModal').modal('hide');
        $(document).ready(function() {
          $('.detail').click(function() {
            const id = $(this).attr('data-id');
            $.ajax({
              url: 'cheque-detail/'+id,
              type: 'GET',
             
              data: {
                "id": id
              },
              success:function(data) {
                console.log(data);
                // $('#product-title').html(data.name);
                // $('#product-desc').html(data.member_id);
                $('#attachment').attr('src', data.attachment);
                //  $('#member_nid').attr('src', data.a_nid);
              }
            })
          
          });
        })
    
    
      
    </script>