# multi-comment-system



#  Laravel Multi-Level Commenting System (Max Depth: 3)

This project is a **multi-level nested commenting system** built using Laravel 11. It allows users to add comments and replies up to 3 levels deep. It also includes recursive rendering, automatic depth handling, and scheduled cleanup of empty comments.

---

##  Features

- **Recursive Commenting**: Comments and replies up to 3 levels deep
-  **Depth Restriction**: Automatically blocks replies beyond level 3
 **Auto Depth Calculation**: No manual depth handling needed
 **Reply Forms** under each comment
 **Scheduled Command**: Deletes empty comments from the database
 **Validation & Error Handling** for missing content or invalid depth

---


- Laravel 11
- PHP 8.2+
- MySQL
- Blade Templating
- Database Name -> comment_system
- 

---

##  Installation Guide

1. **Clone the repository**:

```bash
git clone https://github.com/ArvindLogelite/multi-comment-system.git
cd comment-system

