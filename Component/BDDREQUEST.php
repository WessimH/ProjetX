<?php
function BDD_request($request, $parameters = [], $AffectedRows = false)
{
    try {
        // Ensure the request is not empty
        if (empty($request)) {
            throw new ValueError("The SQL query cannot be empty.");
        }

        // Your database connection code here
        $db = new PDO('mysql:host=localhost;dbname=phpsite;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $db->prepare($request);

        // Execute the query with parameters if any
        $req->execute($parameters);

        // Handling the results based on the type of query
        if (preg_match("/SELECT/i", $request)) {
            return $req->fetchAll(PDO::FETCH_ASSOC);
        } elseif ($AffectedRows == true) {
            return $req->rowCount();
        }


    } catch (PDOException $e) {

        return error_log($e->getMessage());
    } catch (ValueError $e) {
        return error_log($e->getMessage());
    }
    return null;
}
?>

