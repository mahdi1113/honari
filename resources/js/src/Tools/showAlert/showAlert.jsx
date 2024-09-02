import Swal from "sweetalert2";

function showAlert(text, destination = null, type = 'success') {
    Swal.fire({
        // title: type === 'success' ? 'Success!' : 'Error!',
        text: text,
        icon: type,
        confirmButtonText: 'تایید'
    }).then((result) => {
        if (result.isConfirmed) {
            if (destination) {
                window.location.href = destination;
            }
        }
    });
}
export default showAlert;
