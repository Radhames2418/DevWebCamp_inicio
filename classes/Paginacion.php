<?php

namespace Classes;

class Paginacion
{
    public $pagina_actual;
    public $registro_por_pagina;
    public $total_registro;

    public function __construct($pagina_actual = 1, $registro_por_pagina = 10, $total_registro = 0)
    {
        $this->pagina_actual = (int) $pagina_actual;
        $this->registro_por_pagina = (int) $registro_por_pagina;
        $this->total_registro = (int) $total_registro;
    }

    public function offset()
    {
        return $this->registro_por_pagina * ($this->pagina_actual - 1);
    }

    public function total_pagina()
    {
        return ceil($this->total_registro / $this->registro_por_pagina);
    }
}
