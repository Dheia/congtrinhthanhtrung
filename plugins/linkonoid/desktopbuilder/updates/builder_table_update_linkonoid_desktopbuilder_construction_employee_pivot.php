<?php namespace Linkonoid\DesktopBuilder\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateLinkonoidDesktopbuilderConstructionEmployeePivot extends Migration
{
    public function up()
    {
        Schema::rename('linkonoid_desktopbuilder_construction_employee', 'linkonoid_desktopbuilder_construction_employee_pivot');
    }
    
    public function down()
    {
        Schema::rename('linkonoid_desktopbuilder_construction_employee_pivot', 'linkonoid_desktopbuilder_construction_employee');
    }
}
