<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher = '디베이트교사';

    /**
     * @todo import data from CPT
     */
    $info = array(
        '밀알두레학교' => array(
            $teacher,
            '정이솔',
            '김이레',
        ),
        '매일학교' => array(
            $teacher,
            '김영구',
            '이철수',
        ),
    );

    $school = sanitize_text_field($_POST['school']);
    $school = preg_replace('/\s*/m', '', $school);

    $full_name = sanitize_text_field($_POST['full_name']);
    $full_name = preg_replace('/\s*/m', '', $full_name);

    // check error input
    if (empty($school) || empty($full_name)) {
        if (empty($school)) {
            $errors['school'] = '학교 이름을 입력하세요.';
        }
        if (empty($full_name)) {
            $errors['full_name'] = '이름을 입력하세요.';
        }
    } elseif (!(array_key_exists($school, $info)) || !(in_array($full_name, $info[$school]))) {
        // check school and name matching
        if (!array_key_exists($school, $info)) {
            array_push($errors, array('school' => '학교 이름이 올바르지 않습니다. 정확한 학교 이름을 선생님께 문의 하세요.'));
        }
        if (!in_array($full_name, $info[$school])) {
            array_push($errors, array('full_name' => '이름이 명단에 없습니다. 선생님께 문의 하세요.'));
        }
    } else {
        if ($full_name === $teacher) {
            // redirect to TEACHER REGISTER
            echo "교사 회원 가입 페이지";
        } else {
            // redirect to STUDENT REGISTER
            echo "학생 회원 가입 페이지!";
        }
        
    }


}

?>

<div id="register-pre-form" class="widecolumn">
    <?php if (count($errors) > 0): ?>
        <h1>에러 발견!</h1>
        <?php var_dump($errors)?>
    <?php endif;?>
    <?php if ($attributes['show_title']): ?>
        <h3><?php _e('Register', 'personalize-login');?></h3>
    <?php endif;?>

    <?php if (count($attributes['errors']) > 0): ?>
        <?php foreach ($attributes['errors'] as $error): ?>
            <p>
                <?php echo $error; ?>
            </p>
        <?php endforeach;?>
    <?php endif;?>

    <form id="signup-pre-form" action="" method="post">
        <p class="form-row">
            <label for="school"><?php _e('학교', 'personalize-login');?></label>
            <input type="text" name="school" id="school">
        </p>
        <p class="form-row">
            <label for="name"><?php _e('이름', 'personalize-login');?></label>
            <input type="text" name="full_name" id="nick-name">
        </p>
        <p class="register-pre-form-submit">
            <input type="submit" name="submit" class=""
                    value="<?php _e('확인', 'personalize-login');?>">
        </p>
    </form>
</div>