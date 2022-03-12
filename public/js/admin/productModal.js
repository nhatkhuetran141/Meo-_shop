$(document).ready(function () {
    //Lam bien mat cai validation cua summernote text area
    // $('.invalid-feedback ').addClass('disappear-overide');
    $("span.invalid-feedback").remove();

    //Thay doi hinh anh khi load lan dau tien (neu co)
    const imageLink = $("input#image").val();
    if (imageLink) {
        $("#ava_blank").addClass("d-none");
        $(".btn__edit").addClass("d-inline");
        const imageFullLink = url + imageLink;
        $("#image-ava").attr("src", imageLink);
        console.log(imageFullLink);
    }
    //thay doi list anh khi load lan dau
    const imageLinks = $("input#listImages").val();
    if (imageLinks) {
        console.log("list images ne", imageLinks);
        displayListImages(imageLinks);
    }

    //Thay doi anh sau khi an modal
    $("#modal-ava-image").on("hide.bs.modal", (event) => {
        const imageLink = $("input#image").val();
        if (imageLink) {
            $("#ava_blank").addClass("d-none");
            $(".btn__edit").addClass("d-inline");
            const imageFullLink = url + imageLink;
            $("#image-ava").attr("src", imageLink);
            console.log(imageFullLink);
        }
    });

    $("#modal-list-images").on("hide.bs.modal", (event) => {
        const imageLinks = $("input#listImages").val();
        displayListImages(imageLinks);
    });
});

function displayListImages(imageLinks) {
    let html = "";
    try {
        const arrImages = $.parseJSON(imageLinks);
        for (let i = 0; i < arrImages.length; i++) {
            let realUrl = url + arrImages[i];
            realUrl = realUrl.replace(/\s/g, "%20");
            console.log("real url", realUrl);
            html += `   <div class="col-md-3 mb-4" style=" cursor: pointer;" data-toggle="modal" data-target="#modal-list-images" >
                        <img src=${realUrl}  style="width: 150px; height: 150px; object-fit: cover;">
                    </div>`;
        }
    } catch (error) {
        let realUrl = url + imageLinks;
        realUrl = realUrl.replace(/\s/g, "%20");
        console.log("real url", realUrl);
        html += `   <div class="col-md-3 mb-4" style=" cursor: pointer;" data-toggle="modal" data-target="#modal-list-images">
                        <img src=${realUrl}  style="width: 150px; height: 150px; object-fit: cover;">
                    </div>`;
    }
    console.log(html);
    $("#images-container").html(html);
}
