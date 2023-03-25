const user_id = document.querySelector(".user_id")
const user_edit_text = document.querySelector(".user_edit_text")

let formData = source => {
    user_id.value = source.getAttribute('data-id')
    user_edit_text.innerHTML = `<b>Edit User |</b> ${source.getAttribute('data-fname')} ${source.getAttribute('data-lname')}`
}