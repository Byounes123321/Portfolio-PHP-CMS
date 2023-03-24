<?php
include('admin/includes/database.php');
include('admin/includes/config.php');
include('admin/includes/functions.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./public/style/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="./public/script/script.js"></script>
    <title>Bassil Younes</title>
  </head>
  <body class="">
    <header class="header sticky">
      <div class="logo">
        <a href="#"
          ><img src="./public/img/Logo.png" title="logo" alt="logo for bassilyounes"
        /></a>
      </div>
      <nav class="nav">
        <span class="mainNav">
          <ul class="navlinks">
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <a href="./public/Resources/ResumeWebDev-2023 (2).pdf" target="_blank">
            <div class="btn">
              <div class="text">Resume</div>
            </div>
          </a>
        </span>
        <div class="hamMenu" >
          <label for="check">
            <input type="checkbox" id="check" />
            <span></span>
            <span></span>
            <span></span>
          </label>
        </div>
        <div class="mobileNav"> 
          <ul class="navlinks" id="NavLinks">
            <li><a href="#about">About</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#education">Education</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          <div class="btnContainer">
            <a href="./public/Resources/ResumeWebDev-2023 (2).pdf" target="_blank">
            <div class="btn">
              <div class="text">Resume</div>
            </div>
          </a>
        </div>
        </div>
      </nav>
    </header>
    <main id="main">
      <div class="landing">
        <p class="hi">Hi, my name is</p>
        <h1>Bassil Younes</h1>
        <h2>Full Stack Web Developer</h2>
        <p>
          Welcome to my portfolio website! I'm a post-graduate student in the
          Humber Web Development program with a passion for web development. I
          specialize in building web-based applications, with occasional design
          work. My goal is to turn my ideas into reality and create exceptional
          user experiences. I'm excited to continue learning and exploring the
          endless possibilities of the web development industry.
        </p>
      </div>
      <div id="about">
        <h2>About Me</h2>
      </div>
      <div class="about">
        <p>
          Hello, I'm Bassil Younes! I'm a Web Development Student at Humber
          College with a passion for coding, video games, baking, and parkour.
          With an advanced diploma in entrepreneurship and small business, I
          have developed a keen eye for problem-solving and creating value for
          users. I love solving coding challenges and building web-based
          applications because it allows me to create innovative solutions and
          bring ideas to life. When I'm not coding, you can find me baking some
          bread, doing some flips outside or playing my favourite video games.
          I'm excited to connect with professionals in the tech industry and
          learn from them, as well as contribute to exciting projects that push
          the boundaries of what's possible with technology.
        </p>

        <img width="120" height="150" alt="" src="./public/img/HeadShot.jpg" />
      </div>
      <div>
        <h2 id="projects">Projects</h2>
      </div>
      <?php 
        $query = 'SELECT *
          FROM projects
          ORDER BY date DESC';
          $result = mysqli_query(
            $connect, $query
          );
          ?>

         <?php while($record = mysqli_fetch_assoc($result)): ?>

      <div class="projects">
        <div class="projImgs">
          <img class="projectimg" src='<?php echo $record['photo']; ?>' />
          <!-- <div class="projectSkills">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
          </div> -->
        </div>
        <div class="projDesc">
          <div>
            <h3><?php
              if(!$record['url']) {echo $record['title'];}
              else 
             echo "<a href=".$record['url'].">".$record['title']."</a>"?></h3>
          </div>
          <div>
            <p><?php echo $record['content'];?>
            </p>
          </div>
        </div>
      </div>
      <br>
      <?php endwhile; ?>

      <!-- <div class="moreProj">
        <h2>More Projects</h2>
        <div class="gridContainer">
          <a href="#">
            <div class="gridItem">
              <h3>Project Name</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo in
                odit eligendi distinctio est ad fugit, esse cupiditate
                perferendis nostrum ipsum iusto maiores saepe exercitationem
                sunt? Exercitationem recusandae iste consequatur.
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </div>
          </a>
          <a href="#">
            <div class="gridItem">
              <h3>Project Name</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo in
                odit eligendi distinctio est ad fugit, esse cupiditate
                perferendis nostrum ipsum iusto maiores saepe exercitationem
                sunt? Exercitationem recusandae iste consequatur.
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </div>
          </a>
          <a href="#">
            <div class="gridItem">
              <h3>Project Name</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo in
                odit eligendi distinctio est ad fugit, esse cupiditate
                perferendis nostrum ipsum iusto maiores saepe exercitationem
                sunt? Exercitationem recusandae iste consequatur.
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </div>
          </a>
          <a href="#">
            <div class="gridItem">
              <h3>Project Name</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo in
                odit eligendi distinctio est ad fugit, esse cupiditate
                perferendis nostrum ipsum iusto maiores saepe exercitationem
                sunt? Exercitationem recusandae iste consequatur.
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </div>
          </a>
          <a href="#">
            <div class="gridItem">
              <h3>Project Name</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo in
                odit eligendi distinctio est ad fugit, esse cupiditate
                perferendis nostrum ipsum iusto maiores saepe exercitationem
                sunt? Exercitationem recusandae iste consequatur.
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </div>
          </a>
          <a href="#">
            <div class="gridItem">
              <h3>Project Name</h3>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo in
                odit eligendi distinctio est ad fugit, esse cupiditate
                perferendis nostrum ipsum iusto maiores saepe exercitationem
                sunt? Exercitationem recusandae iste consequatur.
              </p>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                <path
                  d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"
                />
              </svg>
            </div>
          </a>
        </div>
        <div class="showMorebtn">
          <a href="#showmore">
            <div class="btn">
              <div class="text">Show More</div>
            </div>
          </a>
        </div>
      </div>  -->

      <div class="education">
        <h2 id="education">Education</h2>
        <?php 
        $query = "SELECT * FROM education";
        $result = mysqli_query($connect, $query);
        ?>
      <?php while($record = mysqli_fetch_assoc($result)): ?>
        <div class="eduItem">
          <!-- <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" /> -->
          <div class="eduDesc">
            <div class= "school"><?php echo $record['school']?></div>
            <div class="degree"><?php echo $record['degree'];?></div>
            <div class="time"><?php echo $record['date']?></div>
            <div class="major"><?php echo $record['major']?></div>
            <div class="schoolDesc">
              <?php echo $record['course']?>
            </div>
          </div>
        </div>
        <?php endwhile; ?>
        <!-- <div class="eduItem">
          <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
          <div class="eduDesc">
            <div class="degree">Postgraduate certificate: Web Development</div>
            <div class="time">Sept 2022 - Aug 2023</div>
            <div class="schoolDesc">
              Learning many real world development skills
            </div>
          </div>
        </div> -->
      </div>
      <div class="skills">
        <h2 id="skills">Skills</h2>
        <div class="skillsContainer">
        <?php 
        $query = "SELECT * FROM skills";
        $result = mysqli_query($connect, $query);
        ?>
      <?php while($record = mysqli_fetch_assoc($result)): ?>
          <div class="skillitem"><a href="<?php echo $record['url']?>" target="_blank">
            <img src="<?php echo $record['logo']?>" alt=""  />
            <h3><?php echo $record['name']?></h3>
            <div class="progOutline">
              <div class="progress" style="width: <?php echo $record['percent']?>%"></div>
      </a></div>
          </div>
        <?php endwhile; ?>
          <!-- <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 20%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div>
          <div class="skillitem">
            <img src="https://aeroclub-issoire.fr/wp-content/uploads/2020/05/image-not-found.jpg" />
            <div class="progOutline">
              <div class="progress" style="width: 65%"></div>
            </div>
          </div> 
         </div> -->
      </div>
      <div id="contact">
        <h2>Contact Me</h2>
        <p>
          Hello, thank you for visiting my website! If you're interested in
          learning more about my work or have any questions, feel free to reach
          out to me using the form below. I'm always looking for exciting new
          projects to work on and opportunities to learn from experienced
          professionals in the tech industry. Whether you're interested in
          discussing a potential placement for my work term starting in July
          2023, or just want to say hi, I'd love to hear from you! So go ahead
          and drop me a message, and I'll get back to you as soon as I can.
        </p>
        <div class="showMorebtn">
          <a href="mailto:bassilyounes@gmail.com">
            <div class="btn">
              <div class="text">Email me!</div>
            </div>
          </a>
        </div>
      </div>
    </main>
    <footer>&copy; Copyright bassilyounes, 2023</footer>
  </body>
</html>
