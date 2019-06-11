<?php

/* server/plugins/section.twig */
class __TwigTemplate_48abde689614793a07d4001a6bfecc97e4013cd614076ee5dffe0f660f0678f2 extends Twig_Template
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
        echo "<div class=\"responsivetable\">
    <table class=\"data_full_width\" id=\"plugins-";
        // line 3
        echo twig_escape_filter($this->env, preg_replace("/[^a-z]/", "", twig_lower_filter($this->env, ($context["plugin_type"] ?? null))), "html", null, true);
        echo "\">
        <caption class=\"tblHeaders\">
            ";
        // line 5
        echo twig_escape_filter($this->env, ($context["plugin_type"] ?? null), "html", null, true);
        echo "
        </caption>
        <thead>
            <tr>
                <th>";
        // line 9
        echo _gettext("Plugin");
        echo "</th>
                <th>";
        // line 10
        echo _gettext("Description");
        echo "</th>
                <th>";
        // line 11
        echo _gettext("Version");
        echo "</th>
                <th>";
        // line 12
        echo _gettext("Author");
        echo "</th>
                <th>";
        // line 13
        echo _gettext("License");
        echo "</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["plugin_list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["plugin"]) {
            // line 18
            echo "                <tr class=\"noclick\">
                    <th>
                        ";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "plugin_name", [], "array"), "html", null, true);
            echo "
                        ";
            // line 21
            if ( !$this->getAttribute($context["plugin"], "is_active", [], "array")) {
                // line 22
                echo "                            <small class=\"attention\">
                                ";
                // line 23
                echo _gettext("disabled");
                // line 24
                echo "                            </small>
                        ";
            }
            // line 26
            echo "                    </th>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "plugin_description", [], "array"), "html", null, true);
            echo "</td>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "plugin_type_version", [], "array"), "html", null, true);
            echo "</td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "plugin_author", [], "array"), "html", null, true);
            echo "</td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["plugin"], "plugin_license", [], "array"), "html", null, true);
            echo "</td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['plugin'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "server/plugins/section.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 33,  95 => 30,  91 => 29,  87 => 28,  83 => 27,  80 => 26,  76 => 24,  74 => 23,  71 => 22,  69 => 21,  65 => 20,  61 => 18,  57 => 17,  50 => 13,  46 => 12,  42 => 11,  38 => 10,  34 => 9,  27 => 5,  22 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "server/plugins/section.twig", "/workspace/research/admin/templates/server/plugins/section.twig");
    }
}
