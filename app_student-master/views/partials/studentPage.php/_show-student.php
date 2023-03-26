

<div class="card w-96 bg-gray-100 shadow-xl m-auto">
    <figure class="px-10 pt-10">
        <img src= <?= $student['url_img'] ?>  alt="Shoes" class="rounded-xl" />
    </figure>
    <div class="card-body items-center text-center">
        <h2 class="card-title">Student</h2>
        <p><?= $student['fname'] ?></p>
        <p><?= $student['lname'] ?></p>
        <p><?= $student['formation'] ?></p>
        <p><?= $student['age'] ?></p>
        <p><?= $student['Email'] ?></p>
        <div class="card-actions">
        <a href=""><button class="btn glass bg-blue-600 shadow-lg hover:text-blue-600">modifier</button></a>
        <a href="delete.php"><button class="btn glass bg-red-600 shadow-lg hover:text-red-600">delete</button></a>
        </div>
    </div>
</div>