
$(document).ready(function () {

    $(".toggleComments").click(function () {
        blogid = $(this).data("blogid");
        $("#blogcomments"+blogid).toggle("slow");
        console.log("BlogID: "+blogid);
    });
});

// async function AddNewBlog()
// {
//     const { value: formValues } = await Swal.fire({
//         title: 'Add New Blog',
//         showCancelButton: false,
//         showConfirmButton: false ,
//         html:  `
//         <form method="POST" action="{{url('storeBlog')}}" class="Add-form">
//             @csrf
//           <label style = "display:flex"> <p style="width:25%; margin-top: revert;">Title</p>
//           <div style="width:100%">
//           <input name="title" placeholder="Blog Title" type="text" id="swal-input1" class="form-control  swal2-input " style="width:80%"/>
//           </div>
//           </label>

//           <label style = "display:flex"> <p style="width:25%; margin-top: revert;">Text</p>
//           <div style="width:100%">
//           <input name="text" placeholder="Blog Text" type="text" id="swal-input2" class="form-control swal2-input" style="width:80%"/>
//           </div>
//           </label>

//          <label style = "display:flex"> <p style="width:25%; margin-top: revert;">Image</p>
//          <input name="image" placeholder="BLog Image" type="file" id="swal-input4" class="form-control swal2-input" style="width:80%" />
//          </label>
//                 <input id="js-btn" type="submit" name="RelSub" value="Add Blog" class="btn btn-primary" style="width: 100px; margin-right: auto;  margin-left: auto; margin-top:40px;"/>
//             </form>

//                 `,
//         focusConfirm: true,
//     })
// }

function heart(V, index, className) {
    let num = document.getElementsByClassName(className);
    if (window.getComputedStyle(V, null).getPropertyValue('color') == "rgb(33, 37, 41)") {
        V.style.color = "red";
        //  num[index].innerHTML = Number(num[index].innerHTML) +1;
    }
    else {
        V.style.color = "rgb(33, 37, 41)";
        //   num[index].innerHTML = Number(num[index].innerHTML) -1;
    }
}
function slideMyBlog(btn) {
    if (window.screen.width > 991) {
        if ($(btn).css("left") == "0px") {
            $(btn).css("left", "50%");
            $('.My-Blogs').css("left", "0%");
        }
        else {
            $(btn).css("left", "0");
            $('.My-Blogs').css("left", "-50%");
        }
    }
    else {
        if ($(btn).css("left") == "0px") {
            $(btn).css("left", "92%");
            $('.My-Blogs').css("left", "0%");
        }
        else {
            $(btn).css("left", "0");
            $('.My-Blogs').css("left", "-100%");
        }
    }

    // Show description function
    async function ShowDesc(Description, PlaceName) {
        Swal.fire({
            title: 'Description for ' + PlaceName,
            text: Description,
            showClass: {
                popup: 'animate__animated animate__fadeInDown'
            },
            hideClass: {
                popup: 'animate__animated animate__fadeOutUp'
            }
        })
    }

    function ellipsis() {

    }

}
