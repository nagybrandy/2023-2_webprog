# Delegation
*Credits to: [Thor's GitHub](https://github.com/gvikthor/)*

## How to Delegate Events?
1. Find the `delegal` function on Thor's GitHub.
2. Copy and paste it into your code, and don't worry about what's inside.
3. Call the function with four parameters:
   - **Parameter 1:** Who is the main parent element containing many similar child elements? This should be a specific node obtained using `querySelector` or `createElement`.
   - **Parameter 2:** Who are the similar child elements? This should be a string selector, for example, 'p' or '.color' or even more complex like 'ul li .specialListItem table td b'.
   - **Parameter 3:** What is the event to be listened for by the parent? This should also be a string, for example, 'click', 'keyup', 'input'.
   - **Parameter 4:** What should happen when the parent sees an event happening on a watched child? This is a two-parameter function where the first parameter is the event, and the second is the child on which the event occurred.

   For example:
   
   ```javascript
   function goToPrincipal(event, child) {
       scoldChild(event.teacherWhoWroteIt);
       giveKiss(child);
   }
   delegate(headteacher, '.elementarySchoolChild', 'writeInAttendanceBook', goToPrincipal);

    function delegate(parent, child, when, what){
        function eventHandler(event){
            let eventTarget = event.target;
            let eventHandler = this;
            let closestMatchingElement = eventTarget.closest(child);

            if(eventHandler.contains(closestMatchingElement)){
                what(event, closestMatchingElement);
            }
        }

        parent.addEventListener(when, eventHandler);
    }
    ```
The above code presents a JavaScript function that helps with event delegation, which means adding event handlers to a parent element for events occurring on dynamically created children. This is very useful, for example, when DOM elements are created later.
