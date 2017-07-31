<!--php的public、protected、private三种访问控制模式的区别-->
<!--public: 公有类型-->
<!--在子类中可以通过self::var调用public方法或属性,parent::method调用父类方法-->
<!--　　　　在实例中可以能过$obj->var 来调用　public类型的方法或属性-->
<!--protected: 受保护类型-->
<!--在子类中可以通过self::var调用protected方法或属性,parent::method调用父类方法-->
<!--在实例中不能通过$obj->var 来调用  protected类型的方法或属性-->
<!--private: 私有类型-->
<!--该类型的属性或方法只能在该类中使用，在该类的实例、子类中、子类的实例中都不能调用私有类型的属性和方法-->
<!---->
<!--2.self 和　parent 的区别-->
<!--a).在子类中常用到这两个对像。他们的主要区别在于self可以调用父类中的公有或受保护的属性，但parent不可以调用-->
<!--b).self:: 它表示当前类的静态成员(方法和属性)　与 $this　不同,$this是指当前对像-->
<!--附代码：-->
<!--static的属性，在内存中只有一份，为所有的实例共用

静态方法不能调用非静态的属性。不能使用self::调用非静态属性，也不能使用 $this 获取非静态属性的值。

在静态方法中不能使用 $this 标识调用非静态方法。

当一个类中有非静态方法被 self:: 调用时，系统会自动将这个方法转换为静态方法。-->
<?php
/**
 * parent　只能调用父类中的公有或受保护的方法，不能调用父类中的属性
 * self 　可以调用父类中除私有类型的方法和属性外的所有数据
 */
class User{
    public $name;
    private $passwd;
    protected $email;
    public  function __construct(){
        //print __CLASS__." ";
        $this->name= 'simple';
        $this->passwd='123456';
        $this->email = 'bjbs_270@163.com';
    }
    public function show(){
        print "good ";
    }
    public function inUserClassPublic() {
        print __CLASS__.'::'.__FUNCTION__." ";
    }
    protected  function inUserClassProtected(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
    private function inUserClassPrivate(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
}

class simpleUser extends User {
    public function __construct(){
        //print __CLASS__." ";
        parent::__construct();
    }

    public function show(){
        print $this->name."//public ";
//        print $this->passwd."//private ";
        print $this->email."//protected ";
    }

    public function inSimpleUserClassPublic() {
        print __CLASS__.'::'.__FUNCTION__." ";
    }

    protected function inSimpleUserClassProtected(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }

    private function inSimpleUserClassPrivate() {
        print __CLASS__.'::'.__FUNCTION__." ";
    }
}

class adminUser extends simpleUser {
    protected $admin_user;
    public function __construct(){
        //print __CLASS__." ";
        parent::__construct();
    }

    public function inAdminUserClassPublic(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }

    protected function inAdminUserClassProtected(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }

    private function inAdminUserClassPrivate(){
        print __CLASS__.'::'.__FUNCTION__." ";
    }
}

class administrator extends adminUser {
    public function __construct(){
        parent::__construct();
    }
}

/**
 * 在类的实例中 只有公有属性和方法才可以通过实例化来调用
 */
$s = new administrator();
print '-------------------';
$s->show();
?>