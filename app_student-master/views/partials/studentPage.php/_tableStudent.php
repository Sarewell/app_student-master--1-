<div class =" overflow-x-auto ">
    <table class="table table-zebra w-full shadow-lg">
        <thead>
            <tr>
                <th>id</th>
                <th>prenom</th>
                <th>nom</th>
                <th>Formation</th>
                <th>voir</th>
                <th>modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($students as $student){ ?>
                <tr>
                    <th><?= $student['id'] ?></th>
                    <th><?= $student['fname'] ?></th>
                    <th><?= $student['lname'] ?></th>
                    <th><?= $student['formation']  ?></th>
                    <th><a href="show-etudiant.php?id=<?= $student['id'] ?>" ><i class="fa-solid fa-eye hover:text-cyan-500"></i></a></th>
                    <th><i class="fa-solid fa-pencil hover:text-green-500"></i></th>
                </tr>

            <?php } ?>
        </tbody>

    </table>