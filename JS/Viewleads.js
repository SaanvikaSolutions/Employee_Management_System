
        // Function to toggle task expansion and icons
        function toggleTask(element) {
            const taskBody = element.nextElementSibling;
            taskBody.classList.toggle('EMSS-expandable');

            const iconRight = element.querySelector('.EMSS-icon-right');
            const iconDown = element.querySelector('.EMSS-icon-down');

            // Toggle visibility of the icons
            if (taskBody.classList.contains('EMSS-expandable')) {
                iconRight.style.display = 'none';
                iconDown.style.display = 'inline';
            } else {
                iconRight.style.display = 'inline';
                iconDown.style.display = 'none';
            }
        }
 
