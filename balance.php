<?php

function calculateUserBalance(array $transactions, string $user): float {
  $userTransactions = array_filter($transactions, function ($transaction) use ($user) {
      return $transaction['user'] === $user;
  });

  $income = 0;
  $expense = 0;

  foreach ($userTransactions as $transaction) {
      if ($transaction['type'] === 'income') {
          $income += $transaction['sum'];
      } elseif ($transaction['type'] === 'expense') {
          $expense += $transaction['sum'];
      }
  }

  $balance = $income - $expense;
  return $balance;
}

$transactions = [
  ['id' => 1, 'user' => 'user1', 'type' => 'income', 'sum' => 100, 'date' => '2023-05-01'],
  ['id' => 2, 'user' => 'user1', 'type' => 'expense', 'sum' => 50, 'date' => '2023-05-02'],
  ['id' => 3, 'user' => 'user2', 'type' => 'income', 'sum' => 200, 'date' => '2023-05-03'],
  ['id' => 4, 'user' => 'user2', 'type' => 'expense', 'sum' => 100, 'date' => '2023-05-04'],
];

$user1 = 'user1';
$user2 = 'user2';
$balance1 = calculateUserBalance($transactions, $user1);
$balance2 = calculateUserBalance($transactions, $user2);
echo "$user1 balance: $balance1 </br>";
echo "$user2 balance: $balance2 </br>";

?>