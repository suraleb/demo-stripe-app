import './bootstrap';
import { Collapse } from 'bootstrap';

(function() {
    'use strict';

    document.addEventListener("DOMContentLoaded", (event) => {
        const collapseCheckbox = document.getElementById('create_account');

        if (collapseCheckbox) {
            const collapseElement = document.getElementById('collapsePassword');
            const bsCollapse = new Collapse(collapseElement, {
                toggle: false
            });

            collapseCheckbox.addEventListener('change', function() {
                bsCollapse.toggle();
            });
        }

    });
})();
