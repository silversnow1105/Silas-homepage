<?php
// DB 연결 정보
$conn = new mysqli("localhost", "webuser", "비밀번호", "my_db");

// 1. 간단한 테스트용 테이블 만들기 (이미 데이터가 있다면 생략 가능)
$conn->query("CREATE TABLE IF NOT EXISTS test_table (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(50), status VARCHAR(20))");
$conn->query("INSERT INTO test_table (name, status) VALUES ('조은설님', '서버 구축 완료'), ('성공!', '매우 좋음')");

// 2. 데이터 가져오기
$sql = "SELECT id, name, status FROM test_table";
$result = $conn->query($sql);
?>

<style>
    table { width: 50%; border-collapse: collapse; margin: 20px auto; font-family: sans-serif; }
    th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
    th { background-color: #4CAF50; color: white; }
    tr:nth-child(even) { background-color: #f2f2f2; }
</style>

<h2>데이터베이스 결과 리스트</h2>
<table>
    <tr>
        <th>번호</th>
        <th>이름</th>
        <th>상태</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td>" . $row["status"]. "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>데이터가 없습니다.</td></tr>";
    }
    ?>
</table>
