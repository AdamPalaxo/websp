/**
 * Changes activity of user account.
 *
 * @param username username of user account
 * @param select select with activity
 */
function changeActivity(username, select)
{
     $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: select.form.action,
            data: {active: select.value, name: 'active'},
            success: function(result){
                $.alert({
                    theme: 'dark',
                    title: 'Aktivita uživatelského účtu <b>' + username.toString() + '</b> úspěšně změněna!',
                    content: 'Aktivita uživatelského účtu změněna na <b>' + select.options[select.selectedIndex].innerHTML.toLowerCase() + '</b>!'
                });
            }});
    });
}

/**
 * Changes role of user account.
 *
 * @param username username of user account
 * @param select select with activity
 */
function changeRole(username, select)
{
    $(document).ready(function(){
        $.ajax({
            type: "POST",
            url: select.form.action,
            data: {role: select.value, name: 'role'},
            success: function(result){
                $.alert({
                    theme: 'dark',
                    title: 'Role uživatelského účtu <b>' + username.toString() + '</b>  úspěšně změněna!',
                    content: 'Role uživatelského účtu změněna na <b>' + select.options[select.selectedIndex].innerHTML.toLowerCase() + '</b>!'
                });
            }});
    });
}

/**
 * Delete user account.
 *
 * @param username username of user account
 * @param button select with activity
 */
function deleteUser(username, button)
{
    $(document).ready(function(){

        $.confirm({
            title: 'Smazat uživatele <b>' + username + '</b>?',
            content: 'Skutečně smazat uživatele?',
            theme: 'dark',
            escapeKey: true,
            backgroundDismiss: false,
            buttons: {
                confirm: {
                    text : "Ano",
                    action: function () {
                        $.ajax({
                            type: "POST",
                            url: button.getAttribute("value"),
                            success: function(result)
                            {
                                  location.reload();
                            }});
                    }},
                cancel: {
                    text : "Ne"
                },
                somethingElse: {
                    text: 'Nápověda',
                    btnClass: 'btn-blue',
                    keys: ['enter', 'shift'],
                    action: function(){
                        $.alert({
                            title: 'Nápověda',
                            content: 'Při kliknutí na tlačítko <b>ano</b>, bude uživatelský účet smazán.',
                            theme: 'dark',
                        });
                        return false;
                    }
                }
            }
        });

    });
}