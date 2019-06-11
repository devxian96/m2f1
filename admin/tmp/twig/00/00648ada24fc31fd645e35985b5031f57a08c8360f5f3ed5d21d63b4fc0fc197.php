<?php

/* database/designer/database_tables.twig */
class __TwigTemplate_73e531f4e8d6494ffd94d2e529b36fdd7268018ea81d95d920907456114f5dc6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["table_names"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["t_n"]) {
            // line 2
            echo "    ";
            $context["i"] = $this->getAttribute($context["loop"], "index0", []);
            // line 3
            echo "    ";
            $context["t_n_url"] = $this->getAttribute(($context["table_names_url"] ?? null), ($context["i"] ?? null), [], "array");
            // line 4
            echo "    <input name=\"t_x[";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_x_";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "_\" />
    <input name=\"t_y[";
            // line 5
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_y_";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "_\" />
    <input name=\"t_v[";
            // line 6
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_v_";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "_\" />
    <input name=\"t_h[";
            // line 7
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "]\" type=\"hidden\" id=\"t_h_";
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "_\" />
    <table id=\"";
            // line 8
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "\"
        cellpadding=\"0\"
        cellspacing=\"0\"
        class=\"designer_tab\"
        style=\"position:absolute; left:";
            // line 13
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array", true, true)) ? ($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array"), "X", [], "array")) : (twig_random($this->env, range(20, 700)))), "html", null, true);
            echo "px; top:";
            // line 14
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array", true, true)) ? ($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array"), "Y", [], "array")) : (twig_random($this->env, range(20, 550)))), "html", null, true);
            echo "px; display:";
            // line 15
            echo ((($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array", true, true) || (($context["display_page"] ?? null) ==  -1))) ? ("block") : ("none"));
            echo "; z-index: 1;\">
        <thead>
            <tr class=\"header\">
                ";
            // line 18
            if (($context["has_query"] ?? null)) {
                // line 19
                echo "                    <td class=\"select_all\">
                        <input class=\"select_all_1\"
                            type=\"checkbox\"
                            style=\"margin: 0;\"
                            value=\"select_all_";
                // line 23
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                echo "\"
                            id=\"select_all_";
                // line 24
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                echo "\"
                            title=\"select all\"
                            designer_url_table_name=\"";
                // line 26
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                echo "\"
                            designer_out_owner=\"";
                // line 27
                echo $this->getAttribute(($context["owner_out"] ?? null), ($context["i"] ?? null), [], "array");
                echo "\">
                    </td>
                ";
            }
            // line 30
            echo "                <td class=\"small_tab\"
                    title=\"";
            // line 31
            echo _gettext("Show/hide columns");
            echo "\"
                    id=\"id_hide_tbody_";
            // line 32
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "\"
                    table_name=\"";
            // line 33
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "\">
                    ";
            // line 34
            echo ((( !$this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array", true, true) ||  !twig_test_empty($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array"), "V", [], "array")))) ? ("v") : ("&gt;"));
            echo "
                </td>
                <td class=\"small_tab_pref small_tab_pref_1\"
                    table_name_small=\"";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute(($context["table_names_small_url"] ?? null), ($context["i"] ?? null), [], "array"), "html", null, true);
            echo "\">
                    <img src=\"";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/exec_small.png"], "method"), "html", null, true);
            echo "\"
                        title=\"";
            // line 39
            echo _gettext("See table structure");
            echo "\" />
                </td>
                <td id=\"id_zag_";
            // line 41
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "\"
                    class=\"tab_zag nowrap tab_zag_noquery\"
                    table_name=\"";
            // line 43
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "\"
                    query_set=\"";
            // line 44
            echo ((($context["has_query"] ?? null)) ? (1) : (0));
            echo "\">
                    <span class=\"owner\">
                        ";
            // line 46
            echo $this->getAttribute(($context["owner_out"] ?? null), ($context["i"] ?? null), [], "array");
            echo "
                    </span>
                    ";
            // line 48
            echo $this->getAttribute(($context["table_names_small_out"] ?? null), ($context["i"] ?? null), [], "array");
            echo "
                </td>
                ";
            // line 50
            if (($context["has_query"] ?? null)) {
                // line 51
                echo "                    <td class=\"tab_zag tab_zag_query\"
                        id=\"id_zag_";
                // line 52
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                echo "_2\"
                        table_name=\"";
                // line 53
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                echo "\">
                    </td>
               ";
            }
            // line 56
            echo "            </tr>
        </thead>
        <tbody id=\"id_tbody_";
            // line 58
            echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
            echo "\"";
            // line 59
            echo ((($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array", true, true) && twig_test_empty($this->getAttribute($this->getAttribute(($context["tab_pos"] ?? null), $context["t_n"], [], "array"), "V", [], "array")))) ? (" style=\"display: none\"") : (""));
            echo ">
            ";
            // line 60
            $context["display_field"] = call_user_func_array($this->env->getFunction('Relation_getDisplayField')->getCallable(), [($context["get_db"] ?? null), $this->getAttribute(($context["table_names_small"] ?? null), ($context["i"] ?? null), [], "array")]);
            // line 61
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_ID", [], "array")) - 1)));
            foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
                // line 62
                echo "                ";
                $context["tmp_column"] = (($context["t_n"] . ".") . $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"));
                // line 63
                echo "                ";
                $context["click_field_param"] = [0 => $this->getAttribute(                // line 64
($context["table_names_small_url"] ?? null), ($context["i"] ?? null), [], "array"), 1 => twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(                // line 65
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"))];
                // line 67
                echo "                ";
                if ( !PhpMyAdmin\Util::isForeignKeySupported($this->getAttribute(($context["table_types"] ?? null), ($context["i"] ?? null), [], "array"))) {
                    // line 68
                    echo "                    ";
                    $context["click_field_param"] = twig_array_merge(($context["click_field_param"] ?? null), [0 => (($this->getAttribute(($context["tables_pk_or_unique_keys"] ?? null), ($context["tmp_column"] ?? null), [], "array", true, true)) ? (1) : (0))]);
                    // line 69
                    echo "                ";
                } else {
                    // line 70
                    echo "                    ";
                    // line 72
                    echo "                    ";
                    $context["click_field_param"] = twig_array_merge(($context["click_field_param"] ?? null), [0 => (($this->getAttribute(($context["tables_all_keys"] ?? null), ($context["tmp_column"] ?? null), [], "array", true, true)) ? (1) : (0))]);
                    // line 73
                    echo "                ";
                }
                // line 74
                echo "                ";
                $context["click_field_param"] = twig_array_merge(($context["click_field_param"] ?? null), [0 => ($context["db"] ?? null)]);
                // line 75
                echo "                <tr id=\"id_tr_";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["table_names_small_url"] ?? null), ($context["i"] ?? null), [], "array"), "html", null, true);
                echo ".";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"), "html", null, true);
                echo "\" class=\"tab_field";
                // line 76
                echo (((($context["display_field"] ?? null) == $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"))) ? ("_3") : (""));
                echo "\" click_field_param=\"";
                // line 77
                echo twig_escape_filter($this->env, twig_join_filter(($context["click_field_param"] ?? null), ","), "html", null, true);
                echo "\">
                    ";
                // line 78
                if (($context["has_query"] ?? null)) {
                    // line 79
                    echo "                        <td class=\"select_all\">
                            <input class=\"select_all_store_col\"
                                value=\"";
                    // line 81
                    echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\"
                                type=\"checkbox\"
                                id=\"select_";
                    // line 83
                    echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                    echo "._";
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\"
                                style=\"margin: 0;\"
                                title=\"select_";
                    // line 85
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\"
                                store_column_param=\"";
                    // line 86
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute(($context["table_names_small_out"] ?? null), ($context["i"] ?? null), [], "array")), "html", null, true);
                    echo ",";
                    // line 87
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["owner_out"] ?? null), ($context["i"] ?? null), [], "array"), "html", null, true);
                    echo ",";
                    // line 88
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo "\">
                        </td>
                    ";
                }
                // line 91
                echo "                    <td width=\"10px\" colspan=\"3\" id=\"";
                echo twig_escape_filter($this->env, twig_urlencode_filter(($context["t_n_url"] ?? null)), "html", null, true);
                echo ".";
                // line 92
                echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                echo "\">
                        <div class=\"nowrap\">
                            ";
                // line 94
                if ($this->getAttribute(($context["tables_pk_or_unique_keys"] ?? null), (($context["t_n"] . ".") . $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), [], "array", true, true)) {
                    // line 95
                    echo "                                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/FieldKey_small.png"], "method"), "html", null, true);
                    echo "\" alt=\"*\" />
                            ";
                } else {
                    // line 97
                    echo "                                ";
                    $context["type"] = "designer/Field_small";
                    // line 98
                    echo "                                ";
                    if ((strstr($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "char") || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 99
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "text"))) {
                        // line 100
                        echo "                                    ";
                        $context["type"] = (($context["type"] ?? null) . "_char");
                        // line 101
                        echo "                                ";
                    } elseif ((((strstr($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "int") || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 102
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "float")) || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 103
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "double")) || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 104
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "decimal"))) {
                        // line 105
                        echo "                                    ";
                        $context["type"] = (($context["type"] ?? null) . "_int");
                        // line 106
                        echo "                                ";
                    } elseif (((strstr($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "date") || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 107
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "time")) || strstr($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 108
($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "year"))) {
                        // line 109
                        echo "                                    ";
                        $context["type"] = (($context["type"] ?? null) . "_date");
                        // line 110
                        echo "                                ";
                    }
                    // line 111
                    echo "                                <img src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => ($context["type"] ?? null)], "method"), "html", null, true);
                    echo ".png\" alt=\"*\" />
                            ";
                }
                // line 113
                echo "                            ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array"), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "TYPE", [], "array"), $context["j"], [], "array"), "html", null, true);
                echo "
                        </div>
                    </td>
                    ";
                // line 116
                if (($context["has_query"] ?? null)) {
                    // line 117
                    echo "                        <td class=\"small_tab_pref small_tab_pref_click_opt\"
                            click_option_param=\"designer_optionse,";
                    // line 119
                    echo twig_escape_filter($this->env, twig_urlencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["tab_column"] ?? null), $context["t_n"], [], "array"), "COLUMN_NAME", [], "array"), $context["j"], [], "array")), "html", null, true);
                    echo ",";
                    // line 120
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["table_names_small_out"] ?? null), ($context["i"] ?? null), [], "array"), "html", null, true);
                    echo "\">
                            <img src=\"";
                    // line 121
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["theme"] ?? null), "getImgPath", [0 => "designer/exec_small.png"], "method"), "html", null, true);
                    echo "\" title=\"options\" />
                        </td>
                    ";
                }
                // line 124
                echo "                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 126
            echo "        </tbody>
    </table>
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['t_n'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "database/designer/database_tables.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  367 => 126,  360 => 124,  354 => 121,  350 => 120,  347 => 119,  344 => 117,  342 => 116,  333 => 113,  327 => 111,  324 => 110,  321 => 109,  319 => 108,  318 => 107,  316 => 106,  313 => 105,  311 => 104,  310 => 103,  309 => 102,  307 => 101,  304 => 100,  302 => 99,  300 => 98,  297 => 97,  291 => 95,  289 => 94,  284 => 92,  280 => 91,  274 => 88,  271 => 87,  268 => 86,  264 => 85,  257 => 83,  251 => 81,  247 => 79,  245 => 78,  241 => 77,  238 => 76,  232 => 75,  229 => 74,  226 => 73,  223 => 72,  221 => 70,  218 => 69,  215 => 68,  212 => 67,  210 => 65,  209 => 64,  207 => 63,  204 => 62,  199 => 61,  197 => 60,  193 => 59,  190 => 58,  186 => 56,  180 => 53,  176 => 52,  173 => 51,  171 => 50,  166 => 48,  161 => 46,  156 => 44,  152 => 43,  147 => 41,  142 => 39,  138 => 38,  134 => 37,  128 => 34,  124 => 33,  120 => 32,  116 => 31,  113 => 30,  107 => 27,  103 => 26,  98 => 24,  94 => 23,  88 => 19,  86 => 18,  80 => 15,  77 => 14,  74 => 13,  67 => 8,  61 => 7,  55 => 6,  49 => 5,  42 => 4,  39 => 3,  36 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "database/designer/database_tables.twig", "/workspace/research/admin/templates/database/designer/database_tables.twig");
    }
}
