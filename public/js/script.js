/**
 * Toggles the visibility of the orders row
 * @param {number} id - The customer ID
 */
function toggleOrders(id) {
    const row = document.getElementById('orders-' + id);
    const indicator = document.getElementById('indicator-' + id);

    if (row.style.display === 'none' || row.style.display === '') {
        row.style.display = 'table-row';
        if (indicator) indicator.innerText = '−'; // Change plus to minus
    } else {
        row.style.display = 'none';
        if (indicator) indicator.innerText = '+'; // Change minus back to plus
    }
}

