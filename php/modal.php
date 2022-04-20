 <!-- Modal -->
        <div class="modal fade" id="addnew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Thêm máy</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <span>Tên máy</span><br>
                            <input id="m-name" class="form-control" type="text" placeholder="Tên máy" aria-label="default input example">
                            <span>Ada Username</span><br>
                            <input id="ada-name" class="form-control" type="text" placeholder="Mời nhập" aria-label="default input example">
                            <span>AIO key</span><br>
                            <input id="aio-key" class="form-control" type="text" placeholder="Mời nhập" aria-label="default input example">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button type="button" onclick="create();" class="btn btn-primary">Chấp nhận</button>
                    </div>
                </div>
            </div>
        </div>

<script>
    var myModalEl = document.getElementById('addnew');
    var modal = new bootstrap.Modal(myModalEl);
    function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
    create=()=>{
        var mName = document.getElementById("m-name").value;
        var adaNme = document.getElementById("ada-name").value;
        var aiokey= document.getElementById("aio-key").value;
        $.post("../model/add.php", {
            name: mName,
            aio_key: aiokey,
            ada_username: adaNme,
            id: readCookie("user-id")
        },
        function(data, status) {
            if (status === 'success') {
                if (data === 'fail') {
                    
                } else {
                    document.getElementById("m-name").value = "";
                    document.getElementById("ada-name").value = "";
                    document.getElementById("aio-key").value = "";
                    modal.hide();
                    location.href = "dashboard.php";
                }
            }
        });
       
    }
</script>
         <!-- Modal -->
         <div class="modal fade" id="edit-micr" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Chỉnh sửa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <span>Tên máy</span><br>
                            <input id="edit-m-name" class="form-control" type="text" placeholder="Tên máy" aria-label="default input example">
                            <span>Ada Username</span><br>
                            <input id="edit-ada-name" class="form-control" type="text" placeholder="Mời nhập" aria-label="default input example">
                            <span>AIO key</span><br>
                            <input id="edit-aio-key" class="form-control" type="text" placeholder="Mời nhập" aria-label="default input example">
                            <input type="hidden" id="edit-id" name="edit-id">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
                        <button onclick="submitEdit();" type="button" class="btn btn-primary">Chấp nhận</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="xac-minh-xoa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Xác nhận xoá</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            Bạn có muốn xoá Microbit id là ! <span id="micro-id-modal"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
        <button onclick="deleteMicOK()" type="button" class="btn btn-primary">Xoá</button>
      </div>
    </div>
  </div>
</div>