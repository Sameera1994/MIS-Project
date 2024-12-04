<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['name', 'email', 'username', 'department', 'password', 'confirmPassword', 'profileImage', 'created_on', 'updated_on'];

      // Search function to find users based on a query
      public function searchUser($query)
      {
          return $this->like('name', $query)
                      ->orLike('email', $query)
                      ->orLike('username', $query)
                      ->orLike('department', $query)
                      ->findAll();
      }

      public function getDepartmentPercentages()
      {
          // Count total users
          $totalUsers = $this->countAll();
          
          // Get department counts
          $departmentQuery = $this->select('department, COUNT(*) as dept_count')
                                  ->groupBy('department')
                                  ->get();
          
          // Calculate percentages
          $departments = [];
          foreach ($departmentQuery->getResult() as $row) {
              $percentage = round(($row->dept_count / $totalUsers) * 100, 2);
              $departments[] = [
                  'name' => $row->department,
                  'count' => $row->dept_count,
                  'percentage' => $percentage
              ];
          }
          
          return $departments;
      }


}
