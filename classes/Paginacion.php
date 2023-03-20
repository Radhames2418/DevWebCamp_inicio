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

    public function pagina_anterior()
    {
        $anterior = $this->pagina_actual - 1;
        return ($anterior > 0) ? $anterior : false;
    }

    public function pagina_siguiente()
    {
        $siguiente = $this->pagina_actual + 1;
        return ($siguiente <= $this->total_pagina()) ? $siguiente : false;
    }

    public function enlace_anterior()
    {
        $html = '';
        if ($this->pagina_anterior()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->pagina_anterior()}\">&laquo; Anterior</a>";
        }
        return $html;
    }

    public function enlace_siguiente()
    {
        $html = '';
        if ($this->pagina_siguiente()) {
            $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$this->pagina_siguiente()}\">Siguiente &raquo; </a>";
        }
        return $html;
    }

    public function numero_pagina()
    {
        $html = '';
        for ($i = 1; $i <= $this->total_pagina(); $i++) {
            if ($i ===  $this->pagina_actual) {
                $html .= "<span class=\"paginacion__enlace paginacion__enlace--actual\">{$i}</span>";
            } else {
                $html .= "<a class=\"paginacion__enlace paginacion__enlace--texto\" href=\"?page={$i}\">{$i}</a>";
            }
        }
        return $html;
    }

    public function paginacion()
    {
        $html = '';
        if ($this->total_registro > 1) {
            $html .= '<div class="paginacion">';
            $html .= $this->enlace_anterior();
            $html .= $this->numero_pagina();
            $html .= $this->enlace_siguiente();
            $html .= '</div>';
        }
        return $html;
    }
}
