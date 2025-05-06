<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php echo isset($page_title) ? $page_title : 'My Lawyer My Way | Professional Legal Services'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="My Lawyer My Way - Professional legal services and representation">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#1a365d',
                            dark: '#0d2240',
                        }
                    },
                    fontFamily: {
                        serif: ['Libre Baskerville', 'serif'],
                        sans: ['Open Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<body class="font-sans text-gray-800 leading-relaxed">
    <!-- Navigation -->
    <?php include("includes/php/menu-bar.php"); ?>
</body>
</html> 