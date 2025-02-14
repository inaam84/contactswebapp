document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".delete-contact").forEach((button) => {
        button.addEventListener("click", function () {
            let contactId = this.getAttribute("data-id");

            if (confirm("Are you sure you want to delete this contact?")) {
                fetch(`/api/v1/contacts/${contactId}`, {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                    },
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.message) {
                            alert("Contact deleted successfully.");
                            location.reload();
                        } else {
                            alert("Error deleting contact.");
                        }
                    });
            }
        });
    });

    let searchInput = document.getElementById("search");

    searchInput.addEventListener("keyup", function () {
        let query = this.value.toLowerCase();
        let rows = document.querySelectorAll("#contacts-table tbody tr");

        rows.forEach(row => {
            let forenames = row.cells[0].textContent.toLowerCase();
            let surname = row.cells[1].textContent.toLowerCase();
            let email = row.cells[2].textContent.toLowerCase();
            let telephone = row.cells[3].textContent.toLowerCase();

            if (forenames.includes(query) || surname.includes(query) || email.includes(query) || telephone.includes(query)) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    });

});
